DGallery
========

Develop Environment: 

Windows 7 with WNMP 2.0.13.0

Mac OS X with MAMP 3.0.5

---
Default setting: 

db_user: *root*

db_pass: *password*

---

Database Info:

1.Database name: dgallery

  (1) dg_user: user info. 

    a) UID(BIGINT,20,Primary Key)
    b) username(VARCHAR,60)
    c) password(VARCHAR,64)
    d) email(VARCHAR,100)
    e) display_name(VARCHAR,200)


  (2) dg_album: album base info. 

    a) AID(BIGINT,20,Primary Key)
    b) albumname(VARCHAR, 100)
    c) albumpath(VARCHAR, 500)
    d) albuminfo(TEXT)
    e) albumpub(BOOL)
    f) albumpass(VARCHAR, 32)

  (3) dg_pic: picture data. 

    a) PID(BIGINT,20,Primary Key)
    b) pAID(BIGINT, 20, Foregine Key)
    c) picname(VARCHAR, 100)
    d) picinfo(TEXT)
    e) slideshow(BOOL)

Document:
/doc/DGallery.pdf (zh-TW)

Database Export:
/sql/dgallery.sql
