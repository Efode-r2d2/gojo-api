# Manage Countries

APIs related to managing country information

**List Countries**
----
  List all registered countries.

* **API Endpoint**

  <a href="">/api/v1/countries</a>

* **Method:**

  `GET`

* **Success Response:**

  * ***Code:*** 200 <br />
    ***Content:*** 
    ```json 
    {
        "Status": true,
        "Message": "Country successfully registered." 
    }
    ```

**Register Country**
----
  Register a country using country_name, capital_city, telephone_code and country code as required parameters.

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