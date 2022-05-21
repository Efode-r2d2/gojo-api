# Manage Countries

APIs related to managing country information

**Register Country**
----
  Register a user using name, phone number and password as required parameters and email as an optional paramter.

* **API Endpoint**

  <a href="">/api/v1/countries</a>

* **Method:**

  `POST`
  
*  **Form Params**

   ***Required:***
    - `country_name=[string]`
    - `capital_city=[string]`
    - `telephone_code=[string]`
    - `country_code=[string]`

    ***Optional:***
    - `email=[string]`

* **Success Response:**

  * ***Code:*** 200 <br />
    ***Content:*** 
    ```json 
    {
        "Status": true,
        "Message": "Country successfully registered." 
    }
    ```
 
* **Error Response:**

  * ***Code:*** 422 Validation Failed <br />
    **Content:** 
    ```json 
    {
        "Status": false,
        "Error": "The country_name field is required."
    }
    ```

  or

   * ***Code:*** 422 Validation Failed <br />
    **Content:** 
    ```json 
    {
        "Status": false,
        "Error": "The country_name has already been taken."
    }
    ```