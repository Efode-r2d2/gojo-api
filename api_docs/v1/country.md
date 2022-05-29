# Manage Countries

APIs related to managing country information.

**List Countries**
----
  List registered countries.

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
        "Countries": [
            {
                "id": 2,
                "country_name": "Djibouti",
                "capital_city": "Djibouti",
                "telephone_code": "252",
                "country_code": "DJ",
                "created_at": "2022-05-21T04:04:42.000000Z",
                "updated_at": "2022-05-21T04:06:09.000000Z"
            }
        ]
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

**Show Country**
----
  Show info of a given country.

* **API Endpoint**

  <a href="">/api/v1/countries/{id}</a>

* **Method:**

  `GET`
  

* **Success Response:**

  * ***Code:*** 200 <br />
    ***Content:*** 
    ```json 
    {
      "Status": true,
      "Country": {
          "id": 4,
          "country_name": "Ethiopia",
          "capital_city": "Addis Ababa",
          "telephone_code": "251",
          "country_code": "ET",
          "created_at": "2022-05-22T09:04:22.000000Z",
          "updated_at": "2022-05-22T09:04:22.000000Z"
      }
    }
    ```

**Update Country**
----
  Update country information.

* **API Endpoint**

  <a href="">/api/v1/countries/{id}</a>

* **Method:**

  `PUT`
  
*  **Form Params**

   ***Required:***
    - `country_name=[string]`
    - `capital_city=[string]`
    - `telephone_code=[string]`
    - `country_code=[string]`

* **Success Response:**

  * ***Code:*** 200 <br />
    ***Content:*** 
    ```json 
    {
        "Status": true,
        "Message": "Country info successfully updated." 
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
  
**Delete Country**
----
  Delete a given country.

* **API Endpoint**

  <a href="">/api/v1/countries/{id}</a>

* **Method:**

  `DELETE`
  

* **Success Response:**

  * ***Code:*** 200 <br />
    ***Content:*** 
    ```json 
    {
        "Status": true,
        "Message": "Country successfully deleted." 
    }
    ```