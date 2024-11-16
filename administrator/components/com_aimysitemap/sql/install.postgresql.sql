CREATE TABLE IF NOT EXISTS "#__aimysitemap" (
    "id"         SERIAL            NOT NULL,
    "url"        VARCHAR(767)      NOT NULL,
    "title"      VARCHAR(255)      NOT NULL DEFAULT '',
    "priority"   REAL              NOT NULL DEFAULT 0.5,
    "mtime"      BIGINT            NOT NULL DEFAULT 0,
    "lang"       VARCHAR(5)        NOT NULL DEFAULT '*',
    "state"      SMALLINT          NOT NULL DEFAULT 0,
    "lock"       SMALLINT          NOT NULL DEFAULT 0,
    "changefreq" VARCHAR(7)        NOT NULL DEFAULT 'monthly',
    PRIMARY KEY( "id" ),
    UNIQUE( "url" )
);

CREATE TABLE IF NOT EXISTS "#__aimysitemap_crawl" (
    "url"        VARCHAR(767)     NOT NULL,
    "code"       SMALLINT         NOT NULL DEFAULT 0,
    "crawled"    SMALLINT         NOT NULL DEFAULT 0,
    "index"      SMALLINT         NOT NULL DEFAULT 0,
    "title"      VARCHAR(255)     NOT NULL DEFAULT '',
    "mtime"      BIGINT           NOT NULL DEFAULT 0,
    "lang"       VARCHAR(5)       NOT NULL DEFAULT '*',
    "refs"       TEXT             NOT NULL DEFAULT '',
    PRIMARY KEY( "url" )
);

CREATE TABLE IF NOT EXISTS "#__aimysitemap_kvstore" (
    "k"          VARCHAR(64)      NOT NULL,
    "v"          TEXT             NOT NULL DEFAULT '',
    PRIMARY KEY( "k" )
);

CREATE TABLE IF NOT EXISTS "#__aimysitemap_broken_links" (
    "id"         SERIAL           NOT NULL,
    "url"        VARCHAR(767)     NOT NULL,
    "srcs"       TEXT             NOT NULL DEFAULT '',
    PRIMARY KEY( "id" ),
    UNIQUE( "url" )
);

-- vim: sts=4 sw=4 ts=4 ai et ft=sql:
