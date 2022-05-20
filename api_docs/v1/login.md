**Login**
----
  Login a user using its phone_number and password. Passport is used as an api authenciction package.

* **API Endpoint**

  <a href="">/api/v1/login</a>

* **Method:**

  `POST`
  
*  **Form Params**

   ***Required:***
    - `phone_number=[string, min 10 chars]`
    - `password=[string]`

* **Success Response:**

  * ***Code:*** 200 <br />
    ***Content:*** 
    ```json 
    {
        "Status": true,
        "User": {
            "id": 1,
            "name": "Test User",
            "phone_number": "0932179091",
            "email": null,
            "phone_number_verified_at": null,
            "created_at": "2022-05-19T15:19:04.000000Z",
            "updated_at": "2022-05-19T15:19:04.000000Z"
        },
        "Access_Token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiNzM1OTRiODE5ZWJhZDBjNjhlM2ZhYTQ3MWI4MTIzMGQ0YWNmZDBlMGFiODNlZWRlYTMxOGNhMDRhYjZiYWE1NmU4YWZhYThlMGZjZWIxNzYiLCJpYXQiOjE2NTMwNTUwOTkuNjQ1MjAxLCJuYmYiOjE2NTMwNTUwOTkuNjQ1MjAyLCJleHAiOjE2ODQ1OTEwOTkuNjQwOTksInN1YiI6IjEiLCJzY29wZXMiOltdfQ.fB_dHKqP01_PmCA6T_UBNDmVR7SjTYzMYh3QGUGu8yY3E2oGbh6G6WHFCcr_iAJOTNk0lzks20t49zEUwnvCIrZzWMpIZSIbaI9YuuC-mqVBMGCyGoQi7serU4i6EEtSioJNFXnTVRVx3x-DCFGFVt1MVXftE9L2jIRHdCVLauTnSvsB3AS5qn5kH_LaMktQ-qxbWRBh7fEvl1HMf6zDBgWeKnRdNX24-plwYMoVnVSYF9ov9yvbaA9znqKeh15GV1Ql7kPdsM3npvnFTxE_WtszPjUxt5U4DnwdG_KngnGvxTEQFFpwIDAxSMIoquyFxmRmikEJg3dSDHmY9G2y6ztC56b7eKqAPFH7qdIo_RsuhrYXW2Y1DSjnnRwiUbJqBLNYOdxsq99gM08RuZPLRLRStJkEiV6wUS7xBsDWfG9NxAvDEBfH-AXd1dT5AYXuIbeaVNcZjyRF3FyWewAZRKTwSTPAdd11LemSPVrNDsG9ZQkvTwTphaIgfBbpt8bgnrZov3RaihK4NsF76WSLUyNjaGwCE7l2cIUDIodR79GxnZ-VPfSSm3y2aSbl_P9MIYIZ_RfwyJg9SWnlflMeQePDkn0ytwpw6Y8HDoZoJQeMDyrEuZZaBmi1v6J-lXGqZC9Nu41foBkzQRjF2d0Zm9Q_sS6zmHMllykRpXwsW08"
    }
    ```
 
* **Error Response:**

  * ***Code:*** 422 Validation Failed <br />
    **Content:** 
    ```json 
    {
        "Status": false,
        "Error": "The phone_number field is required."
    }
    ```

  or

   * ***Code:*** 401 Invalid login credentials <br />
    **Content:** 
    ```json 
    {
        "Status": false,
        "Error": "Invalid login credentials!"
    }
    ```