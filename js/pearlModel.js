function getDate(){
	var d = new Date();
	var day = d.getDate();
	var month = d.getMonth() + 1;
	var year = d.getFullYear();
	
	var sd = year + "-" + month + "-" + day;
	return sd;
	}

function getYesterday(){
	var yesterday = new Date();
	
	yesterday.setDate(yesterday.getDate() - 1);
	
	var day = yesterday.getDate();
	var month = yesterday.getMonth() + 1;
	var year = yesterday.getFullYear();
	
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
		PCTEASE: "",
		PCAUDIO: "",
		PCPARUSH: ""
		}
	});

var SourceAuthorModel = Backbone.Model.extend({
    defaults: {
		PCSOURCEAUTHORID: "0",
		PCTITLE: "Rabbi",
		PCFNAME: "Levi-Yitzchak",
		PCLNAME: "",
		PCTOWN: "Berditchev",
		PCSEFER: "Kiddushas Levi"
		}
	});

var MenuModel = Backbone.Model.extend({
    defaults: {
		PCMENUID: "0",
		PCMENUNAME: "About Us",
		PCLABEL: "Endorsements",
		PCCONNECTION: "Endorsements"
		}
	});

var EndorsementModel = Backbone.Model.extend({
    defaults: {
		PCENDORSEMENTID: "0",
		PCNAME: "A. Avinu",
		PCDATE: "2014-01-20",
		PCENDORSEMENT: "Endorsing and stuff..."
		}
	});
	
/**
 * Collection of Models
 **/
var urlString1 = "../php/DB/getDBTable.php?table=PCParush&date=" + getDate();
var ParushCollection = Backbone.Collection.extend({
    model: ParushModel,
	url: urlString1
});

var urlString2 = "../php/DB/getDBTable.php?table=PCParush&date=" + getYesterday();
var PreviousParushCollection = Backbone.Collection.extend({
    model: ParushModel,
	url: urlString2
});

var SourceAuthorCollection = Backbone.Collection.extend({
    model: SourceAuthorModel,
	sAuthorNumber: 0,
	setAuthorNumber: function(authNum){ this.sAuthorNumber = authNum; },
	setURL: function(authNum){ this.url = "../php/DB/getDBTable.php?table=PCSourceAuthor&key=" + authNum; },
	initialize: function(authNum){ this.setURL(authNum); this.sAuthorNumber = authNum; }, 
	url: "../php/DB/getDBTable.php?table=PCSourceAuthor&key=" + this.sAuthorNumber
});

//PCMENUNAME varchar(24),
//PCLABEL varchar(24),
//PCCONNECTION varchar (256),

var MenuCollection = Backbone.Collection.extend({
    model: MenuModel,
	menuName: "",
	setURL: function(){this.url  = "../php/DB/getMenu.php?menu=" + this.menuName; },
	getURL: function(){alert (this.url);},
	initialize: function(menuName){ this.menuName = menuName; this.setURL(); },
	url: "../php/DB/getMenu.php?Menu=" + this.menuName
});

var EndorsementCollection = Backbone.Collection.extend({
    model: EndorsementModel,
	url: "../php/DB/getDBTable.php?table=PCEndorsement"
});
