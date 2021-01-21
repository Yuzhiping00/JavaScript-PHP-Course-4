/**
     Name: Zhiping Yu  Student Number: 000822513
     File Created Date: 2020-11-17
     Purpose: This file is to retrieve data in the shoppinglist table and display them on the page. Then, after
              user clicks add button, the app sends two requests to the server to insert a new item and retrieve the table
              with new items in it and display the table with new content on the page again.
 */
window.addEventListener("load", function() {
        // get items from the shoppinglist table
        fetch("getList.php",{credentials:'include'})
        .then(response => response.json())
        .then(success);
     /**
      * This function should be called after ajax call is completed and the json-encode
      * array has been extracted from the response
      * @param {items} items 
      */   
    function success(items) {
        let item="";
        for(let i= 0; i< items.length; i++){
            item += itemToHtml(items[i]);
        }
        // output items in the shoppinglist
        document.getElementById("items").innerHTML=item;   
        console.log(items);
    }
    /**
     * Gets am item object and converts it to html for inclusion on the page
     * @param {item} list 
     */
    function itemToHtml(list){
        let element = "<div>";
        element += "<h3> "+ list.item+"("+ list.quantity+")</h3>";
        element+="</div>";
        return element;
    }

    let button = document.getElementById("clickme"); 
    button.addEventListener("click", function() {
       
        let name = document.getElementById("item").value;
        let number = document.getElementById("quantity").value;
        // construct the url
        let url = "addItem.php?&item="+name+"&quantity="+number;

        // When the app gets a response after launching an Ajax request to insert the new item. 
        //it should send Ajax request to retrieve the entire list and display it again on the page. 
          
        fetch(url,{credentials:'include'})
            .then(function(){
                fetch("getList.php",{credentials:'include'})
                    .then(response => response.json())
                    .then(success); 
            })      
    });
});