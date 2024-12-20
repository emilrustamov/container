<?php // $file = D:/OpenServer/domains/container/container/templates/yootheme/packages/builder/elements/row/element.json

return [
  '@import' => $filter->apply('path', './element.php', $file), 
  'name' => 'row', 
  'title' => 'Row', 
  'container' => true, 
  'width' => 500, 
  'templates' => [
    'render' => $filter->apply('path', './templates/template.php', $file), 
    'content' => $filter->apply('path', './templates/content.php', $file)
  ], 
  'fields' => [
    'layout' => [
      'label' => 'Layout', 
      'type' => 'select-img', 
      'title' => 'Select a grid layout', 
      'options' => [
        '' => [
          'label' => 'Whole', 
          'src' => $filter->apply('url', 'images/whole.svg', $file)
        ], 
        '1-2,1-2' => [
          'label' => 'Halves', 
          'src' => $filter->apply('url', 'images/halves.svg', $file)
        ], 
        '1-3,1-3,1-3' => [
          'label' => 'Thirds', 
          'src' => $filter->apply('url', 'images/thirds.svg', $file)
        ], 
        '1-4,1-4,1-4,1-4|1-2,1-2,1-2,1-2' => [
          'label' => 'Quarters', 
          'src' => $filter->apply('url', 'images/quarters.svg', $file)
        ], 
        '1-5,1-5,1-5,1-5,1-5|1-2,1-2,1-3,1-3,1-3' => [
          'label' => 'Fifths', 
          'src' => $filter->apply('url', 'images/fifths.svg', $file)
        ], 
        '1-6,1-6,1-6,1-6,1-6,1-6|1-3,1-3,1-3,1-3,1-3,1-3' => [
          'label' => 'Sixths', 
          'src' => $filter->apply('url', 'images/sixths.svg', $file)
        ], 
        '2-3,1-3' => [
          'label' => 'Thirds 2-1', 
          'src' => $filter->apply('url', 'images/thirds-2-1.svg', $file)
        ], 
        '1-3,2-3' => [
          'label' => 'Thirds 1-2', 
          'src' => $filter->apply('url', 'images/thirds-1-2.svg', $file)
        ], 
        '3-4,1-4' => [
          'label' => 'Quarters 3-1', 
          'src' => $filter->apply('url', 'images/quarters-3-1.svg', $file)
        ], 
        '1-4,3-4' => [
          'label' => 'Quarters 1-3', 
          'src' => $filter->apply('url', 'images/quarters-1-3.svg', $file)
        ], 
        '1-2,1-4,1-4|1-1,1-2,1-2' => [
          'label' => 'Quarters 2-1-1', 
          'src' => $filter->apply('url', 'images/quarters-2-1-1.svg', $file)
        ], 
        '1-4,1-4,1-2|1-2,1-2,1-1' => [
          'label' => 'Quarters 1-1-2', 
          'src' => $filter->apply('url', 'images/quarters-1-1-2.svg', $file)
        ], 
        '1-4,1-2,1-4' => [
          'label' => 'Quarters 1-2-1', 
          'src' => $filter->apply('url', 'images/quarters-1-2-1.svg', $file)
        ], 
        '2-5,3-5' => [
          'label' => 'Fifths 2-3', 
          'src' => $filter->apply('url', 'images/fifths-2-3.svg', $file)
        ], 
        '3-5,2-5' => [
          'label' => 'Fifths 3-2', 
          'src' => $filter->apply('url', 'images/fifths-3-2.svg', $file)
        ], 
        '1-5,4-5' => [
          'label' => 'Fifths 1-4', 
          'src' => $filter->apply('url', 'images/fifths-1-4.svg', $file)
        ], 
        '4-5,1-5' => [
          'label' => 'Fifths 4-1', 
          'src' => $filter->apply('url', 'images/fifths-4-1.svg', $file)
        ], 
        '3-5,1-5,1-5|1-1,1-2,1-2' => [
          'label' => 'Fifths 3-1-1', 
          'src' => $filter->apply('url', 'images/fifths-3-1-1.svg', $file)
        ], 
        '1-5,1-5,3-5|1-2,1-2,1-1' => [
          'label' => 'Fifths 1-1-3', 
          'src' => $filter->apply('url', 'images/fifths-1-1-3.svg', $file)
        ], 
        '1-5,3-5,1-5' => [
          'label' => 'Fifths 1-3-1', 
          'src' => $filter->apply('url', 'images/fifths-1-3-1.svg', $file)
        ], 
        '2-5,1-5,1-5,1-5|1-1,1-3,1-3,1-3' => [
          'label' => 'Fifths 2-1-1-1', 
          'src' => $filter->apply('url', 'images/fifths-2-1-1-1.svg', $file)
        ], 
        '1-5,1-5,1-5,2-5|1-3,1-3,1-3,1-1' => [
          'label' => 'Fifths 1-1-1-2', 
          'src' => $filter->apply('url', 'images/fifths-1-1-1-2.svg', $file)
        ], 
        '1-6,5-6|1-5,4-5' => [
          'label' => 'Sixths 1-5', 
          'src' => $filter->apply('url', 'images/sixths-1-5.svg', $file)
        ], 
        '5-6,1-6|4-5,1-5' => [
          'label' => 'Sixths 5-1', 
          'src' => $filter->apply('url', 'images/sixths-5-1.svg', $file)
        ], 
        'large,expand' => [
          'label' => 'Fixed-Left', 
          'src' => $filter->apply('url', 'images/fixed-left.svg', $file)
        ], 
        'expand,large' => [
          'label' => 'Fixed-Right', 
          'src' => $filter->apply('url', 'images/fixed-right.svg', $file)
        ], 
        'expand,large,expand' => [
          'label' => 'Fixed-Inner', 
          'src' => $filter->apply('url', 'images/fixed-inner.svg', $file)
        ], 
        'large,expand,large' => [
          'label' => 'Fixed-Outer', 
          'src' => $filter->apply('url', 'images/fixed-outer.svg', $file)
        ]
      ]
    ], 
    '_layout' => [
      'text' => 'Edit Layout', 
      'description' => 'Customize the column widths of the selected layout and set the column order. Changing the layout will reset all customizations.', 
      'type' => 'button-panel', 
      'panel' => 'builder-row-layout'
    ], 
    'columns' => [
      'label' => 'Columns', 
      'description' => 'Define a background style or an image of a column and set the vertical alignment for its content.', 
      'type' => 'children'
    ], 
    'column_gap' => [
      'label' => 'Column Gap', 
      'description' => 'Set the size of the gap between the grid columns.', 
      'type' => 'select', 
      'options' => [
        'Small' => 'small', 
        'Medium' => 'medium', 
        'Default' => '', 
        'Large' => 'large', 
        'None' => 'collapse'
      ]
    ], 
    'row_gap' => [
      'label' => 'Row Gap', 
      'description' => 'Set the size of the gap between the grid rows.', 
      'type' => 'select', 
      'options' => [
        'Small' => 'small', 
        'Medium' => 'medium', 
        'Default' => '', 
        'Large' => 'large', 
        'None' => 'collapse'
      ]
    ], 
    'divider' => [
      'label' => 'Divider', 
      'description' => 'Show a divider between grid columns.', 
      'type' => 'checkbox', 
      'text' => 'Show dividers', 
      'enable' => 'column_gap != \'collapse\' && row_gap != \'collapse\''
    ], 
    'alignment' => [
      'label' => 'Alignment', 
      'description' => 'Expand columns equally to always fill remaining space within the row, center them or align them to the left.', 
      'type' => 'select', 
      'options' => [
        'Justify' => '', 
        'Left' => 'left', 
        'Center' => 'center'
      ]
    ], 
    'width' => [
      'label' => 'Max Width', 
      'type' => 'select', 
      'options' => [
        'Default' => 'default', 
        'X-Small' => 'xsmall', 
        'Small' => 'small', 
        'Large' => 'large', 
        'X-Large' => 'xlarge', 
        'Expand' => 'expand', 
        'None' => ''
      ]
    ], 
    'padding_remove_horizontal' => [
      'description' => 'Set the maximum content width. Note: The section may already have a maximum width, which you cannot exceed.', 
      'type' => 'checkbox', 
      'text' => 'Remove horizontal padding', 
      'enable' => 'width && width != \'expand\''
    ], 
    'width_expand' => [
      'label' => 'Expand One Side', 
      'description' => 'Expand the width of one side to the left or right while the other side keeps within the constraints of the max width.', 
      'type' => 'select', 
      'options' => [
        'Don\'t expand' => '', 
        'To left' => 'left', 
        'To right' => 'right'
      ], 
      'enable' => 'width && width != \'expand\''
    ], 
    'height' => [
      'type' => 'select', 
      'options' => [
        'None' => '', 
        'Pixels' => 'pixels', 
        'Viewport' => 'viewport'
      ]
    ], 
    'height_viewport' => [
      'type' => 'number', 
      'attrs' => [
        'placeholder' => '100', 
        'min' => 0, 
        'step' => 10
      ], 
      'enable' => 'height'
    ], 
    'height_offset_top' => [
      'description' => 'Set a fixed height for all columns. They will keep their height when stacking. Optionally, subtract the header height to fill the first visible viewport.', 
      'type' => 'checkbox', 
      'text' => 'Subtract height above row', 
      'enable' => 'height == \'viewport\' && (height_viewport || 0) <= 100'
    ], 
    'margin' => [
      'label' => 'Margin', 
      'type' => 'select', 
      'options' => [
        'Keep existing' => '', 
        'Small' => 'small', 
        'Default' => 'default', 
        'Medium' => 'medium', 
        'Large' => 'large', 
        'X-Large' => 'xlarge', 
        'None' => 'remove-vertical'
      ]
    ], 
    'margin_remove_top' => [
      'type' => 'checkbox', 
      'text' => 'Remove top margin', 
      'enable' => 'margin != \'remove-vertical\''
    ], 
    'margin_remove_bottom' => [
      'description' => 'Set the vertical margin. Note: The first grid\'s top margin and the last grid\'s bottom margin are always removed. Define those in the section settings instead.', 
      'type' => 'checkbox', 
      'text' => 'Remove bottom margin', 
      'enable' => 'margin != \'remove-vertical\''
    ], 
    'html_element' => $config->get('builder.html_element'), 
    'parallax' => [
      'label' => 'Column Parallax', 
      'description' => 'Set a parallax animation to move columns with different heights until they justify at the bottom. Mind that this disables the vertical alignment of elements in the columns.', 
      'type' => 'checkbox', 
      'text' => 'Justify columns at the bottom'
    ], 
    'parallax_start' => [
      'label' => 'Start', 
      'enable' => 'parallax'
    ], 
    'parallax_end' => [
      'label' => 'End', 
      'enable' => 'parallax'
    ], 
    'status' => [
      'label' => 'Status', 
      'description' => 'Disable the row and publish it later.', 
      'type' => 'checkbox', 
      'text' => 'Disable row', 
      'attrs' => [
        'true-value' => 'disabled', 
        'false-value' => ''
      ]
    ], 
    'source' => $config->get('builder.source'), 
    'id' => $config->get('builder.id'), 
    'class' => $config->get('builder.cls'), 
    'attributes' => $config->get('builder.attrs'), 
    'css' => [
      'label' => 'CSS', 
      'description' => 'Enter your own custom CSS. The following selectors will be prefixed automatically for this element: <code>.el-row</code>', 
      'type' => 'editor', 
      'editor' => 'code', 
      'mode' => 'css', 
      'attrs' => [
        'debounce' => 500, 
        'hints' => ['.el-row']
      ]
    ]
  ], 
  'fieldset' => [
    'default' => [
      'type' => 'tabs', 
      'fields' => [[
          'title' => 'Settings', 
          'fields' => ['layout', '_layout', 'columns', 'column_gap', 'row_gap', 'divider', 'alignment', 'width', 'padding_remove_horizontal', 'width_expand', [
              'label' => 'Column Height', 
              'name' => '_height', 
              'type' => 'grid', 
              'width' => '3-4,1-4', 
              'gap' => 'small', 
              'fields' => ['height', 'height_viewport']
            ], 'height_offset_top', 'margin', 'margin_remove_top', 'margin_remove_bottom', 'html_element', 'parallax', [
              'description' => 'The animation starts when the row enters the viewport and ends when it leaves the viewport. Optionally, set a start and end offset, e.g. <code>100px</code>, <code>50vh</code> or <code>50vh + 50%</code>. Percent relates to the row\'s height.', 
              'name' => '_parallax', 
              'type' => 'grid', 
              'width' => '1-2', 
              'fields' => ['parallax_start', 'parallax_end']
            ]]
        ], [
          'title' => 'Advanced', 
          'fields' => ['status', 'source', 'id', 'class', 'attributes', 'css']
        ]]
    ]
  ], 
  'panels' => [
    'builder-row-layout' => [
      'title' => 'Column Layout', 
      'width' => 500, 
      'fields' => [[
          'label' => 'Column 1', 
          'type' => 'group', 
          'divider' => true, 
          'fields' => [[
              'label' => 'Phone Portrait', 
              'description' => 'Set the column width for each breakpoint. Mix fraction widths or combine fixed widths with the <i>Expand</i> value. If no value is selected, the column width of the next smaller screen size is applied. The combination of widths should always take the full width.', 
              'type' => 'child-prop', 
              'index' => 0, 
              'field' => [
                'name' => 'width_default', 
                'type' => 'select', 
                'options' => $config->get('builder.column_width_options_default')
              ]
            ], [
              'label' => 'Phone Landscape', 
              'description' => 'Set the column width for each breakpoint. Mix fraction widths or combine fixed widths with the <i>Expand</i> value. If no value is selected, the column width of the next smaller screen size is applied. The combination of widths should always take the full width.', 
              'type' => 'child-prop', 
              'index' => 0, 
              'field' => [
                'name' => 'width_small', 
                'type' => 'select', 
                'options' => $config->get('builder.column_width_options')
              ]
            ], [
              'label' => 'Tablet Landscape', 
              'description' => 'Set the column width for each breakpoint. Mix fraction widths or combine fixed widths with the <i>Expand</i> value. If no value is selected, the column width of the next smaller screen size is applied. The combination of widths should always take the full width.', 
              'type' => 'child-prop', 
              'index' => 0, 
              'field' => [
                'name' => 'width_medium', 
                'type' => 'select', 
                'options' => $config->get('builder.column_width_options')
              ]
            ], [
              'label' => 'Desktop', 
              'description' => 'Set the column width for each breakpoint. Mix fraction widths or combine fixed widths with the <i>Expand</i> value. If no value is selected, the column width of the next smaller screen size is applied. The combination of widths should always take the full width.', 
              'type' => 'child-prop', 
              'index' => 0, 
              'field' => [
                'name' => 'width_large', 
                'type' => 'select', 
                'options' => $config->get('builder.column_width_options')
              ]
            ], [
              'label' => 'Large Screen', 
              'description' => 'Set the column width for each breakpoint. Mix fraction widths or combine fixed widths with the <i>Expand</i> value. If no value is selected, the column width of the next smaller screen size is applied. The combination of widths should always take the full width.', 
              'type' => 'child-prop', 
              'index' => 0, 
              'field' => [
                'name' => 'width_xlarge', 
                'type' => 'select', 
                'options' => $config->get('builder.column_width_options')
              ]
            ], [
              'label' => 'Order First', 
              'type' => 'child-prop', 
              'description' => 'Select the breakpoint from which the column will start to appear before other columns. On smaller screen sizes, the column will appear in the natural order.', 
              'index' => 0, 
              'field' => [
                'name' => 'order_first', 
                'type' => 'select', 
                'options' => $config->get('builder.column_order_first_options')
              ]
            ]]
        ], [
          'label' => 'Column 2', 
          'type' => 'group', 
          'divider' => true, 
          'fields' => [[
              'label' => 'Phone Portrait', 
              'description' => 'Set the column width for each breakpoint. Mix fraction widths or combine fixed widths with the <i>Expand</i> value. If no value is selected, the column width of the next smaller screen size is applied. The combination of widths should always take the full width.', 
              'type' => 'child-prop', 
              'index' => 1, 
              'field' => [
                'name' => 'width_default', 
                'type' => 'select', 
                'options' => $config->get('builder.column_width_options_default')
              ]
            ], [
              'label' => 'Phone Landscape', 
              'description' => 'Set the column width for each breakpoint. Mix fraction widths or combine fixed widths with the <i>Expand</i> value. If no value is selected, the column width of the next smaller screen size is applied. The combination of widths should always take the full width.', 
              'type' => 'child-prop', 
              'index' => 1, 
              'field' => [
                'name' => 'width_small', 
                'type' => 'select', 
                'options' => $config->get('builder.column_width_options')
              ]
            ], [
              'label' => 'Tablet Landscape', 
              'description' => 'Set the column width for each breakpoint. Mix fraction widths or combine fixed widths with the <i>Expand</i> value. If no value is selected, the column width of the next smaller screen size is applied. The combination of widths should always take the full width.', 
              'type' => 'child-prop', 
              'index' => 1, 
              'field' => [
                'name' => 'width_medium', 
                'type' => 'select', 
                'options' => $config->get('builder.column_width_options')
              ]
            ], [
              'label' => 'Desktop', 
              'description' => 'Set the column width for each breakpoint. Mix fraction widths or combine fixed widths with the <i>Expand</i> value. If no value is selected, the column width of the next smaller screen size is applied. The combination of widths should always take the full width.', 
              'type' => 'child-prop', 
              'index' => 1, 
              'field' => [
                'name' => 'width_large', 
                'type' => 'select', 
                'options' => $config->get('builder.column_width_options')
              ]
            ], [
              'label' => 'Large Screen', 
              'description' => 'Set the column width for each breakpoint. Mix fraction widths or combine fixed widths with the <i>Expand</i> value. If no value is selected, the column width of the next smaller screen size is applied. The combination of widths should always take the full width.', 
              'type' => 'child-prop', 
              'index' => 1, 
              'field' => [
                'name' => 'width_xlarge', 
                'type' => 'select', 
                'options' => $config->get('builder.column_width_options')
              ]
            ], [
              'label' => 'Order First', 
              'description' => 'Select the breakpoint from which the column will start to appear before other columns. On smaller screen sizes, the column will appear in the natural order.', 
              'type' => 'child-prop', 
              'index' => 1, 
              'field' => [
                'name' => 'order_first', 
                'type' => 'select', 
                'options' => $config->get('builder.column_order_first_options')
              ]
            ]], 
          'show' => 'this.node.children.length > 1'
        ], [
          'label' => 'Column 3', 
          'type' => 'group', 
          'divider' => true, 
          'fields' => [[
              'label' => 'Phone Portrait', 
              'description' => 'Set the column width for each breakpoint. Mix fraction widths or combine fixed widths with the <i>Expand</i> value. If no value is selected, the column width of the next smaller screen size is applied. The combination of widths should always take the full width.', 
              'type' => 'child-prop', 
              'index' => 2, 
              'field' => [
                'name' => 'width_default', 
                'type' => 'select', 
                'options' => $config->get('builder.column_width_options_default')
              ]
            ], [
              'label' => 'Phone Landscape', 
              'description' => 'Set the column width for each breakpoint. Mix fraction widths or combine fixed widths with the <i>Expand</i> value. If no value is selected, the column width of the next smaller screen size is applied. The combination of widths should always take the full width.', 
              'type' => 'child-prop', 
              'index' => 2, 
              'field' => [
                'name' => 'width_small', 
                'type' => 'select', 
                'options' => $config->get('builder.column_width_options')
              ]
            ], [
              'label' => 'Tablet Landscape', 
              'description' => 'Set the column width for each breakpoint. Mix fraction widths or combine fixed widths with the <i>Expand</i> value. If no value is selected, the column width of the next smaller screen size is applied. The combination of widths should always take the full width.', 
              'type' => 'child-prop', 
              'index' => 2, 
              'field' => [
                'name' => 'width_medium', 
                'type' => 'select', 
                'options' => $config->get('builder.column_width_options')
              ]
            ], [
              'label' => 'Desktop', 
              'description' => 'Set the column width for each breakpoint. Mix fraction widths or combine fixed widths with the <i>Expand</i> value. If no value is selected, the column width of the next smaller screen size is applied. The combination of widths should always take the full width.', 
              'type' => 'child-prop', 
              'index' => 2, 
              'field' => [
                'name' => 'width_large', 
                'type' => 'select', 
                'options' => $config->get('builder.column_width_options')
              ]
            ], [
              'label' => 'Large Screen', 
              'description' => 'Set the column width for each breakpoint. Mix fraction widths or combine fixed widths with the <i>Expand</i> value. If no value is selected, the column width of the next smaller screen size is applied. The combination of widths should always take the full width.', 
              'type' => 'child-prop', 
              'index' => 2, 
              'field' => [
                'name' => 'width_xlarge', 
                'type' => 'select', 
                'options' => $config->get('builder.column_width_options')
              ]
            ], [
              'label' => 'Order First', 
              'description' => 'Select the breakpoint from which the column will start to appear before other columns. On smaller screen sizes, the column will appear in the natural order.', 
              'type' => 'child-prop', 
              'index' => 2, 
              'field' => [
                'name' => 'order_first', 
                'type' => 'select', 
                'options' => $config->get('builder.column_order_first_options')
              ]
            ]], 
          'show' => 'this.node.children.length > 2'
        ], [
          'label' => 'Column 4', 
          'type' => 'group', 
          'divider' => true, 
          'fields' => [[
              'label' => 'Phone Portrait', 
              'description' => 'Set the column width for each breakpoint. Mix fraction widths or combine fixed widths with the <i>Expand</i> value. If no value is selected, the column width of the next smaller screen size is applied. The combination of widths should always take the full width.', 
              'type' => 'child-prop', 
              'index' => 3, 
              'field' => [
                'name' => 'width_default', 
                'type' => 'select', 
                'options' => $config->get('builder.column_width_options_default')
              ]
            ], [
              'label' => 'Phone Landscape', 
              'description' => 'Set the column width for each breakpoint. Mix fraction widths or combine fixed widths with the <i>Expand</i> value. If no value is selected, the column width of the next smaller screen size is applied. The combination of widths should always take the full width.', 
              'type' => 'child-prop', 
              'index' => 3, 
              'field' => [
                'name' => 'width_small', 
                'type' => 'select', 
                'options' => $config->get('builder.column_width_options')
              ]
            ], [
              'label' => 'Tablet Landscape', 
              'description' => 'Set the column width for each breakpoint. Mix fraction widths or combine fixed widths with the <i>Expand</i> value. If no value is selected, the column width of the next smaller screen size is applied. The combination of widths should always take the full width.', 
              'type' => 'child-prop', 
              'index' => 3, 
              'field' => [
                'name' => 'width_medium', 
                'type' => 'select', 
                'options' => $config->get('builder.column_width_options')
              ]
            ], [
              'label' => 'Desktop', 
              'description' => 'Set the column width for each breakpoint. Mix fraction widths or combine fixed widths with the <i>Expand</i> value. If no value is selected, the column width of the next smaller screen size is applied. The combination of widths should always take the full width.', 
              'type' => 'child-prop', 
              'index' => 3, 
              'field' => [
                'name' => 'width_large', 
                'type' => 'select', 
                'options' => $config->get('builder.column_width_options')
              ]
            ], [
              'label' => 'Large Screen', 
              'description' => 'Set the column width for each breakpoint. Mix fraction widths or combine fixed widths with the <i>Expand</i> value. If no value is selected, the column width of the next smaller screen size is applied. The combination of widths should always take the full width.', 
              'type' => 'child-prop', 
              'index' => 3, 
              'field' => [
                'name' => 'width_xlarge', 
                'type' => 'select', 
                'options' => $config->get('builder.column_width_options')
              ]
            ], [
              'label' => 'Order First', 
              'description' => 'Select the breakpoint from which the column will start to appear before other columns. On smaller screen sizes, the column will appear in the natural order.', 
              'type' => 'child-prop', 
              'index' => 3, 
              'field' => [
                'name' => 'order_first', 
                'type' => 'select', 
                'options' => $config->get('builder.column_order_first_options')
              ]
            ]], 
          'show' => 'this.node.children.length > 3'
        ], [
          'label' => 'Column 5', 
          'type' => 'group', 
          'divider' => true, 
          'fields' => [[
              'label' => 'Phone Portrait', 
              'description' => 'Set the column width for each breakpoint. Mix fraction widths or combine fixed widths with the <i>Expand</i> value. If no value is selected, the column width of the next smaller screen size is applied. The combination of widths should always take the full width.', 
              'type' => 'child-prop', 
              'index' => 4, 
              'field' => [
                'name' => 'width_default', 
                'type' => 'select', 
                'options' => $config->get('builder.column_width_options_default')
              ]
            ], [
              'label' => 'Phone Landscape', 
              'description' => 'Set the column width for each breakpoint. Mix fraction widths or combine fixed widths with the <i>Expand</i> value. If no value is selected, the column width of the next smaller screen size is applied. The combination of widths should always take the full width.', 
              'type' => 'child-prop', 
              'index' => 4, 
              'field' => [
                'name' => 'width_small', 
                'type' => 'select', 
                'options' => $config->get('builder.column_width_options')
              ]
            ], [
              'label' => 'Tablet Landscape', 
              'description' => 'Set the column width for each breakpoint. Mix fraction widths or combine fixed widths with the <i>Expand</i> value. If no value is selected, the column width of the next smaller screen size is applied. The combination of widths should always take the full width.', 
              'type' => 'child-prop', 
              'index' => 4, 
              'field' => [
                'name' => 'width_medium', 
                'type' => 'select', 
                'options' => $config->get('builder.column_width_options')
              ]
            ], [
              'label' => 'Desktop', 
              'description' => 'Set the column width for each breakpoint. Mix fraction widths or combine fixed widths with the <i>Expand</i> value. If no value is selected, the column width of the next smaller screen size is applied. The combination of widths should always take the full width.', 
              'type' => 'child-prop', 
              'index' => 4, 
              'field' => [
                'name' => 'width_large', 
                'type' => 'select', 
                'options' => $config->get('builder.column_width_options')
              ]
            ], [
              'label' => 'Large Screen', 
              'description' => 'Set the column width for each breakpoint. Mix fraction widths or combine fixed widths with the <i>Expand</i> value. If no value is selected, the column width of the next smaller screen size is applied. The combination of widths should always take the full width.', 
              'type' => 'child-prop', 
              'index' => 4, 
              'field' => [
                'name' => 'width_xlarge', 
                'type' => 'select', 
                'options' => $config->get('builder.column_width_options')
              ]
            ], [
              'label' => 'Order First', 
              'description' => 'Select the breakpoint from which the column will start to appear before other columns. On smaller screen sizes, the column will appear in the natural order.', 
              'type' => 'child-prop', 
              'index' => 4, 
              'field' => [
                'name' => 'order_first', 
                'type' => 'select', 
                'options' => $config->get('builder.column_order_first_options')
              ]
            ]], 
          'show' => 'this.node.children.length > 4'
        ], [
          'label' => 'Column 6', 
          'type' => 'group', 
          'fields' => [[
              'label' => 'Phone Portrait', 
              'description' => 'Set the column width for each breakpoint. Mix fraction widths or combine fixed widths with the <i>Expand</i> value. If no value is selected, the column width of the next smaller screen size is applied. The combination of widths should always take the full width.', 
              'type' => 'child-prop', 
              'index' => 5, 
              'field' => [
                'name' => 'width_default', 
                'type' => 'select', 
                'options' => $config->get('builder.column_width_options_default')
              ]
            ], [
              'label' => 'Phone Landscape', 
              'description' => 'Set the column width for each breakpoint. Mix fraction widths or combine fixed widths with the <i>Expand</i> value. If no value is selected, the column width of the next smaller screen size is applied. The combination of widths should always take the full width.', 
              'type' => 'child-prop', 
              'index' => 5, 
              'field' => [
                'name' => 'width_small', 
                'type' => 'select', 
                'options' => $config->get('builder.column_width_options')
              ]
            ], [
              'label' => 'Tablet Landscape', 
              'description' => 'Set the column width for each breakpoint. Mix fraction widths or combine fixed widths with the <i>Expand</i> value. If no value is selected, the column width of the next smaller screen size is applied. The combination of widths should always take the full width.', 
              'type' => 'child-prop', 
              'index' => 5, 
              'field' => [
                'name' => 'width_medium', 
                'type' => 'select', 
                'options' => $config->get('builder.column_width_options')
              ]
            ], [
              'label' => 'Desktop', 
              'description' => 'Set the column width for each breakpoint. Mix fraction widths or combine fixed widths with the <i>Expand</i> value. If no value is selected, the column width of the next smaller screen size is applied. The combination of widths should always take the full width.', 
              'type' => 'child-prop', 
              'index' => 5, 
              'field' => [
                'name' => 'width_large', 
                'type' => 'select', 
                'options' => $config->get('builder.column_width_options')
              ]
            ], [
              'label' => 'Large Screen', 
              'description' => 'Set the column width for each breakpoint. Mix fraction widths or combine fixed widths with the <i>Expand</i> value. If no value is selected, the column width of the next smaller screen size is applied. The combination of widths should always take the full width.', 
              'type' => 'child-prop', 
              'index' => 5, 
              'field' => [
                'name' => 'width_xlarge', 
                'type' => 'select', 
                'options' => $config->get('builder.column_width_options')
              ]
            ], [
              'label' => 'Order First', 
              'description' => 'Select the breakpoint from which the column will start to appear before other columns. On smaller screen sizes, the column will appear in the natural order.', 
              'type' => 'child-prop', 
              'index' => 5, 
              'field' => [
                'name' => 'order_first', 
                'type' => 'select', 
                'options' => $config->get('builder.column_order_first_options')
              ]
            ]], 
          'show' => 'this.node.children.length > 5'
        ]]
    ]
  ]
];
