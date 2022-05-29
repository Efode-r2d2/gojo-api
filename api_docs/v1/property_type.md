# Manage Property Types

APIs related to managing property types.

**List Property Types**
----
  List registered property types.

* **API Endpoint**

  <a href="">/api/v1/property_types</a>

* **Method:**

  `GET`

* **Success Response:**

  * ***Code:*** 200 <br />
    ***Content:*** 
    ```json 
    {
        "Status": true,
        "Property_Types": [
            {
                "id": 1,
                "property_type_name": "Condo",
                "property_type_code": "P12",
                "created_at": "2022-05-28T19:41:05.000000Z",
                "updated_at": "2022-05-28T19:41:05.000000Z"
            }
        ]
    }
    ```

**Register Property Type**
----
  Register Property Type using property_type_name and property_type_code as required parameters.

* **API Endpoint**

  <a href="">/api/v1/property_types</a>

* **Method:**

  `POST`
  
*  **Form Params**

   ***Required:***
    - `property_type_name=[string]`
    - `property_type_code=[string]`

* **Success Response:**

  * ***Code:*** 200 <br />
    ***Content:*** 
    ```json 
    {
        "Status": true,
        "Message": "Property Type successfully registered." 
    }
    ```
 
* **Error Response:**

  * ***Code:*** 422 Validation Failed <br />
    **Content:** 
    ```json 
    {
        "Status": false,
        "Error": "The property_type_name field is required."
    }
    ```

  or

   * ***Code:*** 422 Validation Failed <br />
    **Content:** 
    ```json 
    {
        "Status": false,
        "Error": "The property_type_name has already been taken."
    }
    ```

**Show Property Type**
----
  Show info of a given property type.

* **API Endpoint**

  <a href="">/api/v1/property_types/{id}</a>

* **Method:**

  `GET`
  

* **Success Response:**

  * ***Code:*** 200 <br />
    ***Content:*** 
    ```json 
    {
        "Status": true,
        "Property_Type": {
            "id": 1,
            "property_type_name": "Condo",
            "property_type_code": "P12",
            "created_at": "2022-05-28T19:41:05.000000Z",
            "updated_at": "2022-05-28T19:41:05.000000Z"
        }
    }
    ```

**Update Property Type**
----
  Update property type information.

* **API Endpoint**

  <a href="">/api/v1/property_types/{id}</a>

* **Method:**

  `PUT`
  
*  **Form Params**

   ***Required:***
    - `property_type_name=[string]`
    - `property_type_code=[string]`

* **Success Response:**

  * ***Code:*** 200 <br />
    ***Content:*** 
    ```json 
    {
        "Status": true,
        "Message": "Property Type info successfully updated." 
    }
    ```
 
* **Error Response:**

  * ***Code:*** 422 Validation Failed <br />
    **Content:** 
    ```json 
    {
        "Status": false,
        "Error": "The property_type_name field is required."
    }
    ```

  or

   * ***Code:*** 422 Validation Failed <br />
    **Content:** 
    ```json 
    {
        "Status": false,
        "Error": "The property_type_name has already been taken."
    }
    ```
  
**Delete Property Type**
----
  Delete a given property type.

* **API Endpoint**

  <a href="">/api/v1/property_types/{id}</a>

* **Method:**

  `DELETE`
  

* **Success Response:**

  * ***Code:*** 200 <br />
    ***Content:*** 
    ```json 
    {
        "Status": true,
        "Message": "Property type successfully deleted." 
    }
    ```