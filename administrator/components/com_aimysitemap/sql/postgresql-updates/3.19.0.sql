ALTER TABLE "#__aimysitemap_crawl"
    ADD COLUMN "code"
    smallint NOT NULL DEFAULT 0;
ALTER TABLE "#__aimysitemap_crawl"
    ADD COLUMN "refs"
    TEXT NOT NULL DEFAULT '';

CREATE TABLE IF NOT EXISTS "#__aimysitemap_broken_links" (
    "id"         SERIAL           NOT NULL,
    "url"        VARCHAR(767)     NOT NULL,
    "srcs"       TEXT             NOT NULL DEFAULT '',
    PRIMARY KEY( "id" ),
    UNIQUE( "url" )
);
