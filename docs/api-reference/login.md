## Login Api

### `POST` Login
```
/api/login
```
Login with user
#### Request Headers
| Key | Value |
|---|---|
|Accept|application/json

#### Parameter
| para | type | optional |
|---|---|---|
|email|email|true
|password|string|true

#### Response
```json
{
    "result": {
        "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjZlMmM1MzAxM2M4NDA0MTU0NzlmMTY2Zjc2MjU1ZjZlM2UxZWU3NDQ5M2Y1MDYzOGY2YmJlOGQ4NzgzYjA1OTU4OTc4ZjQ2Y2FjMzBlNDQ0In0.eyJhdWQiOiIxIiwianRpIjoiNmUyYzUzMDEzYzg0MDQxNTQ3OWYxNjZmNzYyNTVmNmUzZTFlZTc0NDkzZjUwNjM4ZjZiYmU4ZDg3ODNiMDU5NTg5NzhmNDZjYWMzMGU0NDQiLCJpYXQiOjE1Mzg0ODg2MzgsIm5iZiI6MTUzODQ4ODYzOCwiZXhwIjoxNTcwMDI0NjM4LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.LAyqAAFC_7yEre_9KLq2ldbBU8R56i321wn6qgcHGCd-RzGtIXSij_Qcezd-VSolWR_Z2-xH1jdAP4tDWvUgtCRLl9c2IaMXrZGbD4BxScQgNOFrC2KlYa9OZe6tdIZlhBCE6wgz_zZnwriJO2SRsJQPVysR_PbFwbzUT9VmOiPeAt9iikFfRVbYjbkEFhYQAFYYHP1Udy8ImoTMrZW0Hg8UafASN5HUXlhqHc-BXWpXfK3BmD-0Ea7j7RGTa6wIpEzbrP9jx9eEMJBmFlIZaOCxSE6_YWLPQ0yMRTzrXA-cbEk4pC5fHM6wCtKbBbHEsVzYyX0VoEfBFZ4g-mOVGv_Ebt4QNPOCknLhJrqNz6RBL58ZCcHEY1A9CkWvPlbt4l4ChpRTZoMKqr2yt6hz8WME4LdP_2qvuZmg9r_jnO3Jx1iPA1ygB4cHUjT_wlPetOq2GAJvP0qZf8xWCCEVdTsj_cusmS5_RV5jf_Awd4rfOXuIBcyab2Z-1aI6oQH-Os84uiXTzU6l9Lqp3PJ1QLkrWmcFE22otVO680R05dZwPB3kYQ70_DE7JPJTApTpgsUESUnJn2UkQ_gnmn3GPt-nTw9hWa2uWdNsctp3aZjSfzDMQk27hmzE3-gSAMbduBWwScFzHZi5IhsjmPJo03nxQIT_UPbbdevW_LxE2Io",
        "user": {
            "id": 1,
            "full_name": "Mr. Cortez Dach MD",
            "email": "nam@gmail.com",
            "phone": "(844) 501-7883",
            "address": "9878 Nicolette Wall Suite 571\nNolanmouth, WA 29745-1592",
            "is_active": 0,
            "last_login_at": "2018-09-30 08:03:33",
            "remember_token": "gGbGPMLNJ3",
            "created_at": "2018-09-17 08:47:21",
            "updated_at": "2018-09-30 08:03:33",
            "deleted_at": null
        }
    },
    "code": 200
}
```
