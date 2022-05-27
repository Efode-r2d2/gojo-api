# Manage Cities

APIs related to managing cities.

**List Countries**
----
  List registered cities under a specific {region}.

* **API Endpoint**

  <a href="">/api/v1/regions/{region}/cities</a>

* **Method:**

  `GET`

* **Success Response:**

  * ***Code:*** 200 <br />
    ***Content:*** 
    ```json 
    {
        "Status": true,
        "Cities": [
            {
                "id": 1,
                "city_name": "Addis Ababa",
                "city_code": "AA",
                "created_at": "2022-05-21T04:04:42.000000Z",
                "updated_at": "2022-05-21T04:06:09.000000Z"
            }
        ]
    }
    ```

**Register Country**
----
  Register a city using city_name and city_code as required parameters.

* **API Endpoint**

  <a href="">/api/v1/regions/{region}/cities</a>

* **Method:**

  `POST`
  
*  **Form Params**

   ***Required:***
    - `city_name_name=[string]`
    - `city_code=[string]`

* **Success Response:**

  * ***Code:*** 200 <br />
    ***Content:*** 
    ```json 
    {
        "Status": true,
        "Message": "City successfully registered." 
    }
    ```
 
* **Error Response:**

  * ***Code:*** 422 Validation Failed <br />
    **Content:** 
    ```json 
    {
        "Status": false,
        "Error": "The city_name field is required."
    }
    ```

  or

   * ***Code:*** 422 Validation Failed <br />
    **Content:** 
    ```json 
    {
        "Status": false,
        "Error": "The city_name has already been taken."
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
        "Message": "Country successfully delete." 
    }
    ```