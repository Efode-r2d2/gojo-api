**Register User**
----
  Register a user using name, phone number and password as required parameters and email as an optional paramter.

* **URL**

  <a href="">/api/v1/register</a>

* **Method:**

  `POST`
  
*  **Form Params**

   ***Required:***
    - `name=[string]`
    - `phone_number=[string, min 10 chars]`
    - `password=[string]`

    ***Optional:***
    - `email=[string]`

* **Success Response:**

  * ***Code:*** 200 <br />
    ***Content:*** 
    ```json 
        {
            "Status": true,
            "Message": "User successfully registered." 
        }
    ```
 
* **Error Response:**

  * **Code:** 404 NOT FOUND <br />
    **Content:** `{ error : "User doesn't exist" }`

  OR

  * **Code:** 401 UNAUTHORIZED <br />
    **Content:** `{ error : "You are unauthorized to make this request." }`