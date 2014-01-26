var menuData = [
{
	"id": 		1,
	"label":	"Button #1",
	"parentID": -1
}, {
	"id": 		2,
	"label":	"Option 1.1",
	"parentID": 1
}, {
	"id": 		3,
	"label":	"Option 1.2",
	"parentID": 1
}, {
	"id": 		4,
	"label":	"Option 1.3",
	"parentID": 1
}, {
	"id": 		5,
	"label":	"Option 1.4",
	"parentID": 1
}, {
	"id": 		6,
	"label":	"Option 1.5",
	"parentID": 1
}, {
	"id": 		7,
	"label":	"Option 1.2.1",
	"parentID": 2
}, {	
	"id": 		8,
	"label":	"Option 1.2.2",
	"parentID": 2
}, {	
	"id": 		9,
	"label":	"Option 1.2.3",
	"parentID": 2
}, {
	"id": 		10,
	"label":	"Option 1.3.1",
	"parentID": 4
}, {
	"id": 		11,
	"label":	"Option 1.3.2",
	"parentID": 4
}, {
	"id": 		12,
	"label":	"Option 1.3.3",
	"parentID": 4
}, {
	"id": 		13,
	"label":	"Button #2",
	"parentID": -1
}, {
	"id": 		14,
	"label":	"Button #3",
	"parentID": -1
}, {
	"id": 		15,
	"label":	"Button #4",
	"parentID": -1
}];

/**************************************************
 * put menu object data into an array of arrays
 * form: arrayIndex.items = [array of options where parentID = arrayIndex]
 **************************************************/
 
function buildMenuArray(){
	menuArray = [];
	tempArray = [];
	for(var i=0; i<menuData.length; i++){
		var id 			= menuData[i].id;
		var label 		= menuData[i].label;
		var parentID 	= menuData[i].parentID;
		
		var temp = {'id':id,'label':label,'parentID':parentID};
		if(tempArray[parentID]){
			if(!(tempArray[parentID].items)){
				tempArray[parentID].items = [];
				}
			//push temp onto the temporary array
			tempArray[parentID].items[tempArray[parentID].items.length] = temp;
			tempArray[id] = temp;
			}
		else {
			tempArray[id] = {'id':id,'label':label,'parentID':parentID};
			menuArray[id] = tempArray[id];
			}
		}
	return menuArray;
	}

var buildUL = function (parent, items) {
    $.each(items, function () {
        if (this.label) {
            // create LI element and append it to the parent element.
            var li = $("<li class='menuLI'>" + this.label + "</li>");
            li.appendTo(parent);
            // if there are sub items, call the buildUL function.
            if (this.items && this.items.length > 0) {
                var ul = $("<ul class='menuUL'></ul>");
                ul.appendTo(li);
                buildUL(ul, this.items);
            }
        }
    });
}

var x = buildMenuArray();

var ul = $("<ul></ul>");
buildUL(ul, x);

//alert(ul.html());

ul.appendTo("#jqxMenu");
//$("<p>Test</p>").appendTo("#This");


