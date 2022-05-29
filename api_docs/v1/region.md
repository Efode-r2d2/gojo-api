# Manage Regions

APIs related to managing regions.

**List Regions**
----
  List registered regions.

* **API Endpoint**

  <a href="">/api/v1/countries/{country}/regions</a>

* **Method:**

  `GET`

* **Success Response:**

  * ***Code:*** 200 <br />
    ***Content:*** 
    ```json 
    {
        "Status": true,
        "Regions": [
            {
                "id": 2,
                "region_name": "Amhara",
                "region_code": "AM",
                "country": "1",
                "created_at": "2022-05-21T04:04:42.000000Z",
                "updated_at": "2022-05-21T04:06:09.000000Z"
            }
        ]
    }
    ```

**Register a Region**
----
  Register a region using region_name and region_code as required form parameters and country as url parameter.

* **API Endpoint**

  <a href="">/api/v1/countries/{country}/regions</a>

* **Method:**

  `POST`
  
*  **Form Params**

   ***Required:***
    - `region_name=[string]`
    - `region_code=[string]`

* **Success Response:**

  * ***Code:*** 200 <br />
    ***Content:*** 
    ```json 
    {
        "Status": true,
        "Message": "Region successfully registered." 
    }
    ```
 
* **Error Response:**

  * ***Code:*** 422 Validation Failed <br />
    **Content:** 
    ```json 
    {
        "Status": false,
        "Error": "The region_name field is required."
    }
    ```

  or

   * ***Code:*** 422 Validation Failed <br />
    **Content:** 
    ```json 
    {
        "Status": false,
        "Error": "The region_name has already been taken."
    }
    ```

**Show Region**
----
  Delete a given region.

* **API Endpoint**

  <a href="">/api/v1/regions/{id}</a>

* **Method:**

  `GET`
  

* **Success Response:**

  * ***Code:*** 200 <br />
    ***Content:*** 
    ```json 
    {
      "Status": true,
      "Region": {
          "id": 3,
          "region_name": "Addis Ababa",
          "region_code": "9",
          "country": 2,
          "created_at": "2022-05-27T18:11:42.000000Z",
          "updated_at": "2022-05-27T18:11:42.000000Z"
      }
    }
    ```

**Update Region**
----
  Update region information.

* **API Endpoint**

  <a href="">/api/v1/regions/{id}</a>

* **Method:**

  `PUT`
  
*  **Form Params**

   ***Required:***
    - `region_name=[string]`
    - `region_code=[string]`

* **Success Response:**

  * ***Code:*** 200 <br />
    ***Content:*** 
    ```json 
    {
        "Status": true,
        "Message": "Region info successfully updated." 
    }
    ```
 
* **Error Response:**

  * ***Code:*** 422 Validation Failed <br />
    **Content:** 
    ```json 
    {
        "Status": false,
        "Error": "The region_name field is required."
    }
    ```

  or

   * ***Code:*** 422 Validation Failed <br />
    **Content:** 
    ```json 
    {
        "Status": false,
        "Error": "The region_name has already been taken."
    }
    ```
  
**Delete Region**
----
  Delete a given region.

* **API Endpoint**

  <a href="">/api/v1/regions/{id}</a>

* **Method:**

  `DELETE`
  

* **Success Response:**

  * ***Code:*** 200 <br />
    ***Content:*** 
    ```json 
    {
        "Status": true,
        "Message": "Region successfully deleted." 
    }
    ```