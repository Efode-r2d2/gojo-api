**Register Usdr**
----
  Register a user using name, phone number and password as required parameters and email as an optional paramter.

* **URL**

  <a>/api/v1/register</a>

* **Method:**

  `POST`
  
*  **URL Params**

   **Required:**
 
   `name=[string]`

* **Data Params**

  None

* **Success Response:**

  * **Code:** 200 <br />
    **Content:** ```{
                "Status": true,
                "Message": "User successfully registered." }```
 
* **Error Response:**

  * **Code:** 404 NOT FOUND <br />
    **Content:** `{ error : "User doesn't exist" }`

  OR

  * **Code:** 401 UNAUTHORIZED <br />
    **Content:** `{ error : "You are unauthorized to make this request." }`

* **Sample Call:**

  ```javascript
    $.ajax({
      url: "/users/1",
      dataType: "json",
      type : "GET",
      success : function(r) {
        console.log(r);
      }
    });
  ```