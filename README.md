DGallery
========

Develop Environment: Windows 7 with WNMP 2.0.13.0

---
Default setting: 

db_user: *root*

db_pass: *password*

---

Database Info:

1.Database name: dgallery

  (1) dg_user: user info. 

    a) UID(BIGINT,20,Primary Key)
    b) dg_urname(VARCHAR,60)
    c) dg_urpass(VARCHAR,64)
    d) dg_uremail(VARCHAR,100)
    e) display_name(VARCHAR,200)


  (2) dg_albumroot: album base info. 

    a) AID(BIGINT,20,Primary Key)
    b) albumname(VARCHAR, 100)
    c) albumpub(BOOL)


  (3) dg_albumsecurity: album security setting.

    a) AID(BIGINT, 20, foreign key)
    b) dg_alname(VAR, 100)
    c) dg_alpath(VAR, 500)
    d) dg_alpass(VAR, 64)


  (4) dg_albumdata: album other data

    a) AID(BIGINT, 20, foreign key)
    b) albumname(VAR, 100) 
    c) albuminfo(TEXT)
    d) piccount(INT)
    

Document:
/doc/DGallery.pdf (zh-TW)

Database:
/sql/dgallery.sql
