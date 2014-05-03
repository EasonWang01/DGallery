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
    e) display_name(VARCHAR,250)


  (2) dg_albumroot: album base info. 

    a) AID(BIGINT,20,Primary Key)
    b) dg_alname(VARCHAR, 100, Foregine Key, not null)
    c) dg_alpub(BOOL)


  (3) dg_albumsecurity: album security setting.

    a) dg_alname(VAR, 100, Foregine Key,not null)
    b) dg_alpath(VAR, 500, not null)
    c) dg_alpass(VAR, 64)


  (4) dg_albumdata: album other data

    a) dg_alname(VAR, 100, Foregine Key, not null) 
    b) dg_alinfo(TEXT)
    c) dg_picnum(int)
    

Document:
/doc/DGallery.pdf (zh-TW)
Database:
/sql/dgallery.sql
