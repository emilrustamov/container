<?php

/**
 * JCH Optimize - Performs several front-end optimizations for fast downloads
 *
 * @package   jchoptimize/core
 * @author    Samuel Marshall <samuel@jch-optimize.net>
 * @copyright Copyright (c) 2022 Samuel Marshall / JCH Optimize
 * @license   GNU/GPLv3, or later. See LICENSE file
 *
 *  If LICENSE file missing, see <http://www.gnu.org/licenses/>.
 */

namespace JchOptimize\Core\Html;

use CodeAlfa\RegexTokenizer\Html;
use JchOptimize\Core\Exception;
use JchOptimize\Core\Exception\PregErrorException;
use JchOptimize\Core\Html\Callbacks\AbstractCallback;

use function array_map;
use function array_pop;
use function array_slice;
use function defined;
use function implode;
use function is_string;
use function preg_match;
use function preg_match_all;
use function preg_replace_callback;
use function str_replace;

defined('_JCH_EXEC') or die('Restricted access');
class Parser
{
    use Html;

    public bool $alsoExcludeStringsAndComments = \false;
    /** @var string        Regex criteria of search */
    protected string $sCriteria = '';
    /** @var array         Array of regex of excludes in search */
    protected array $aExcludes = array();
    /** @var array          Array of ElementObjects containing criteria for elements to search for */
    protected array $aElementObjects = array();
    protected bool $onlyMatchElements = \true;
    public function __construct()
    {
    }
    //language=RegExp
    public static function htmlBodyElementToken(): string
    {
        return self::htmlHeadElementToken() . '\\K.*+$';
    }
    //language=RegExp
    public static function htmlHeadElementToken(): string
    {
        $aExcludes = array(self::htmlElementToken('script'), self::htmlCommentToken());
        return '<head\\b' . self::parseHtml($aExcludes) . '</head\\b\\s*+>';
    }
    //language=RegExp
    protected static function parseHtml(array $excludes = [], $lazy = \true, $alsoExcludeStringsAndComments = \false): string
    {
        $a = '';
        if ($alsoExcludeStringsAndComments) {
            $excludes[] = self::stringWithCaptureValueToken();
            $excludes[] = self::commentToken();
            $excludes[] = '[`\'"/<]';
            $a = '`\'"/';
        }
        $excludes[] = self::htmlSelfClosingElementToken();
        $excludes[] = '<';
        $excludes = '(?:' . implode('|', $excludes) . ')?';
        $lazily = $lazy ? '?' : '';
        return "(?>[^<{$a}]*+{$excludes})*{$lazily}[^<{$a}]*+";
    }
    //language=RegExp
    public static function htmlClosingHeadTagToken(): string
    {
        $excludes = [self::htmlElementToken('script'), self::htmlCommentToken()];
        return self::parseHtml($excludes) . '\\K(?:</head\\s*+>|$)';
    }
    //language=RegExp
    public static function htmlClosingBodyTagToken(): string
    {
        return '.*\\K</body\\s*+>(?=(?><?[^<]*+)*?</html\\s*+>)';
    }
    public function addElementObject(\JchOptimize\Core\Html\ElementObject $oElementObject): void
    {
        $this->aElementObjects[] = $oElementObject;
    }
    public function addExclude(string $sExclude): void
    {
        $this->aExcludes[] = $sExclude;
    }
    /**
     * @throws PregErrorException
     */
    public function processMatchesWithCallback(string $html, \JchOptimize\Core\Html\CallbackInterface $callbackObject): string
    {
        $regex = $this->getHtmlSearchRegex();
        if ($callbackObject instanceof AbstractCallback) {
            $callbackObject->setRegex($regex);
        }
        $sProcessedHtml = (string) preg_replace_callback('#' . $regex . '#six', array($callbackObject, 'processMatches'), $html);
        try {
            self::throwExceptionOnPregError();
        } catch (\Exception $exception) {
            throw new Exception\PregErrorException($exception->getMessage());
        }
        return $sProcessedHtml;
    }
    protected function getHtmlSearchRegex(): string
    {
        $this->setCriteria();
        //language=RegExp
        if ($this->onlyMatchElements) {
            $regex = self::parseHtml($this->getExcludes(), \true, $this->alsoExcludeStringsAndComments) . '\\K(?:' . $this->getCriteria() . '|$)';
        } else {
            $regex = '(' . self::parseHtml($this->getExcludes(), \true, $this->alsoExcludeStringsAndComments) . ')(' . $this->getCriteria() . '|$)';
        }
        return $regex;
    }
    //language=RegExp
    protected function setCriteria(bool $bBranchReset = \true): void
    {
        $aCriteria = array();
        /** @var ElementObject $oElement */
        foreach ($this->aElementObjects as $oElement) {
            $sRegex = '<';
            $aNames = implode('|', $oElement->getNamesArray());
            $sRegex .= '(' . $aNames . ')\\b\\s*+';
            $sRegex .= $oElement->bCaptureAttributes === \true ? '(' : '';
            $sRegex .= $this->compileCriteria($oElement);
            $aCaptureAttributes = $oElement->getCaptureAttributesArray();
            if (!empty($aCaptureAttributes)) {
                $mValueCriteria = $oElement->getValueCriteriaRegex();
                if (is_string($mValueCriteria)) {
                    $aValueCriteria = array('.' => $mValueCriteria);
                } else {
                    $aValueCriteria = $mValueCriteria;
                }
                foreach ($aCaptureAttributes as $sCaptureAttribute) {
                    foreach ($aValueCriteria as $sRegexKey => $sValueCriteria) {
                        if ($sValueCriteria != '' && preg_match('#' . $sRegexKey . '#i', $sCaptureAttribute)) {
                            //If criteria is specified for attribute it must match
                            $sRegex .= '(?=' . $this->parseAttributes() . '(' . self::htmlAttributeWithCaptureValueToken($sCaptureAttribute, \true, \true, $sValueCriteria) . '))';
                        } else {
                            //If no criteria specified matching is optional
                            $sRegex .= '(?=(?:' . $this->parseAttributes() . '(' . self::htmlAttributeWithCaptureValueToken($sCaptureAttribute, \true, \true) . '))?)';
                        }
                    }
                }
            }
            if (!empty($aCaptureOneOrBothAttributes = $oElement->getCaptureOneOrBothAttributesArray())) {
                //Has to be either a string for both attributes or associative array of criteria for both attributes
                $mValueCriteria = $oElement->getValueCriteriaRegex();
                if (is_string($mValueCriteria)) {
                    $aValueCriteria = [$aCaptureOneOrBothAttributes[0] => $mValueCriteria, $aCaptureOneOrBothAttributes[1] => $mValueCriteria];
                } else {
                    $aValueCriteria = $mValueCriteria;
                }
                $sRegex .= '(?(?=' . $this->parseAttributes() . '(' . self::htmlAttributeWithCaptureValueToken($aCaptureOneOrBothAttributes[0], \true, \true, $aValueCriteria[$aCaptureOneOrBothAttributes[0]]) . '))' . '(?=' . $this->parseAttributes() . '(' . self::htmlAttributeWithCaptureValueToken($aCaptureOneOrBothAttributes[1], \true, \true, $aValueCriteria[$aCaptureOneOrBothAttributes[1]]) . '))?|' . '(?=' . $this->parseAttributes() . '(' . self::htmlAttributeWithCaptureValueToken($aCaptureOneOrBothAttributes[1], \true, \true, $aValueCriteria[$aCaptureOneOrBothAttributes[1]]) . ')))';
            }
            $sRegex .= $this->parseAttributes();
            $sRegex .= $oElement->bCaptureAttributes === \true ? ')' : '';
            $sRegex .= '/?>';
            if (!$oElement->bSelfClosing) {
                $sRegex .= $oElement->bSelfClosing === null ? '(?:' : '';
                if ($oElement->bCaptureContent) {
                    $sRegex .= $oElement->getValueCriteriaRegex() . '(' . self::parseHtml([], $oElement->bParseContentLazily) . ')';
                } else {
                    $sRegex .= self::parseHtml([], $oElement->bParseContentLazily);
                }
                $sRegex .= '</(?:' . $aNames . ')\\s*+>';
                $sRegex .= $oElement->bSelfClosing === null ? ')?' : '';
            }
            $aCriteria[] = $sRegex;
        }
        $sCriteria = implode('|', $aCriteria);
        if ($bBranchReset) {
            $this->sCriteria = '(?|' . $sCriteria . ')';
        } else {
            $this->sCriteria = $sCriteria;
        }
    }
    //language=RegExp
    protected function compileCriteria(\JchOptimize\Core\Html\ElementObject $oElement): string
    {
        $sCriteria = '';
        $aAttrNegCriteria = $oElement->getNegAttrCriteriaArray();
        if (!empty($aAttrNegCriteria)) {
            foreach ($aAttrNegCriteria as $sAttrNegCriteria) {
                $sCriteria .= $this->processNegCriteria($sAttrNegCriteria);
            }
        }
        $aAttrPosCriteria = $oElement->getPosAttrCriteriaArray();
        if (!empty($aAttrPosCriteria)) {
            $posCriteria = '';
            foreach ($aAttrPosCriteria as $sAttrPosCriteria) {
                $posCriteria .= $this->processPosCriteria($sAttrPosCriteria);
            }
            if ($oElement->negateAggregatedPosCriteria) {
                $posCriteria = '(?!' . $posCriteria . ')';
            }
            $sCriteria .= $posCriteria;
        }
        return $sCriteria;
    }
    //language=RegExp
    protected function processNegCriteria($sCriteria): string
    {
        return '(?!' . $this->processCriteria($sCriteria) . ')';
    }
    protected function processCriteria($sCriteria): string
    {
        return $this->parseAttributes() . '(?:' . str_replace('==', '\\s*+=\\s*+', $sCriteria) . ')';
    }
    //language=RegExp
    protected function parseAttributes(): string
    {
        return self::parseAttributesStatic();
    }
    //language=RegExp
    protected function processPosCriteria($sCriteria): string
    {
        return '(?=' . $this->processCriteria($sCriteria) . ')';
    }
    protected function getExcludes(): array
    {
        return $this->aExcludes;
    }
    protected function getCriteria(): string
    {
        return $this->sCriteria;
    }
    /**
     * @param string $sHtml
     * @param int $flags
     * @return array
     * @throws Exception\PregErrorException
     */
    public function findMatches(string $sHtml, int $flags = \PREG_PATTERN_ORDER): array
    {
        $regex = $this->getHtmlSearchRegex();
        preg_match_all('#' . $regex . '#six', $sHtml, $aMatches, $flags);
        try {
            self::throwExceptionOnPregError();
        } catch (\Exception $exception) {
            throw new Exception\PregErrorException($exception->getMessage());
        }
        //Last array will always be an empty string so let's remove that
        if ($flags == \PREG_PATTERN_ORDER) {
            return array_map(function ($a) {
                return array_slice($a, 0, -1);
            }, $aMatches);
        } elseif ($flags == \PREG_SET_ORDER) {
            array_pop($aMatches);
            return $aMatches;
        } else {
            return $aMatches;
        }
    }
    public function getElementWithCriteria(): string
    {
        $this->setCriteria(\false);
        return $this->sCriteria;
    }
    public function setOnlyMatchElements(bool $tag): void
    {
        $this->onlyMatchElements = $tag;
    }
}
