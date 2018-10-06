## Register Api

### `POST` Register
```
/api/register
```
Login with user
#### Request Headers
| Key | Value |
|---|---|
|Accept|application/json

#### Parameter
| para | type | optional |
|---|---|---|
|full_name|string|true
|email|email|true
|password|string|true
|address|string|false
|phone|string|false

#### Response
```json
{
    "result": {
        "user": {
            "id": 14,
            "full_name": "asdasd",
            "email": "namhoangtran@dim-coin.com",
            "phone": null,
            "address": null,
            "is_active": 0,
            "last_login_at": null,
            "remember_token": null,
            "created_at": "2018-10-02 13:29:53",
            "updated_at": "2018-10-02 13:29:53",
            "deleted_at": null
        },
        "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjYwY2RhMDIxMjJjYzMyNzk0ZTNhNDBiMDk2NzY3NGExMTFhOTcwZDQwZGYwYWUxMmJmYjQyMTlhOWIzZWQ4NTVhZTZjNWNhNDFjODRiYmJhIn0.eyJhdWQiOiIxIiwianRpIjoiNjBjZGEwMjEyMmNjMzI3OTRlM2E0MGIwOTY3Njc0YTExMWE5NzBkNDBkZjBhZTEyYmZiNDIxOWE5YjNlZDg1NWFlNmM1Y2E0MWM4NGJiYmEiLCJpYXQiOjE1Mzg0ODY5OTMsIm5iZiI6MTUzODQ4Njk5MywiZXhwIjoxNTcwMDIyOTkzLCJzdWIiOiIxNCIsInNjb3BlcyI6W119.bgotfQpX5Bkw-R2UMIGyCG8icIOx9Sil7qCnyXg1TydPrvQMkeYzVm_EzYYahESODVIHN0rQCd_5z7wy8NyILrFUtdy59bGUbxSkfCoK-SSWS1S9FMwDDwn__qC8IADTZLA3yqAANr4LZZVUa8l6Jb5-L9DCzRG53_6rTK3PY34CQpv3_K8rKUisFbDW8TePjgCXnm4qxMFtQzbuRF3gKlseT6tQ8MKYBEXgEAr9PkF4FeWtcjJzhztIg-CRSL7dfoHAkQpHCtuGj-Z9it5sW19933zxcyYNytptx-uahF22SaGkHuHqRl9DqNA3oWvwwLpsTm_lx5wJg1VTkShtU9q8B_02rX_g2y4yii-Ns-cqeyuoTVPDFFHx-2lpubzzn9IdWG9AEwTP2ldh93XT3QcMmcrUdwa7lxkqK-n78uvSfvlnket69sCAbduyuY3lkHS28CMrvp_qILFBBAR71h7GHqpQ2ClijNpx0H2LumNchaB2KCVNU3hKNLn_T8V0GpdnMeOWMeejUPPwZ09Kr2LDqAeXAZB7dUy8l2XwCMSYzpcZEPyumLd4nAiLz2Grx9UruevoHhxYd4vZiCHK2lpPspCclHrgTsa9iSlM0YRU2ovlkTOohqiGlysbMoDOVZbs0n1Xf2kXs7OsxvK1bf7woflTo3ebNFGEbPpbAjU"
    },
    "code": 200
}
```
