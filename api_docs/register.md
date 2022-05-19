**Register User**
----
  Register a user using name, phone number and password as required parameters and email as an optional paramter.

* **API Endpoint**

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

  * ***Code:*** 422 Validation Failed <br />
    **Content:** 
    ```json 
    {
        "Status": false,
        "Error": "The name field is required."
    }
    ```

  OR

   * ***Code:*** 422 Validation Failed <br />
    **Content:** 
    ```json 
    {
        "Status": false,
        "Error": "The phone number has already been taken."
    }
    ```