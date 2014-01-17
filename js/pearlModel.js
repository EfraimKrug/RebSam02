function getDate(){
	var d = new Date();
	var day = d.getDate();
	var month = d.getMonth() + 1;
	var year = d.getFullYear();
	
	var sd = year + "-" + month + "-" + day;
	return sd;
	}

var ParushModel = Backbone.Model.extend({
    defaults: {
		PCPARUSHID: "0",
		PCPRESENTATIONDATE: "2014-01-16",
		PCSUBMITDATE: "2014-01-16",
		PCTEXTID: 0,
		PCAUTHORID: 0,
		PCSOURCEAUTHOR: 0,
		PCSIDDURPLACE: 0,
		PCTHEME1: "",
		PCTHEME2: "",
		PCTHEME3: "",
		PCPARUSH: ""
		}
	});
	
/**
 * Collection of Models
 **/
var urlString = "../php/DB/getDBTable.php?table=PCParush&date=" + getDate();
var ParushCollection = Backbone.Collection.extend({
    model: ParushModel,
	url: urlString
});
