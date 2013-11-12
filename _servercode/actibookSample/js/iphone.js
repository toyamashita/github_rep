if (navigator.userAgent.indexOf('iPad') != -1) {
        document.write('<link rel="stylesheet" type="text/css" href="css/ipad.css" />');
}else if (navigator.userAgent.indexOf('iPhone') != -1) {
		document.write('<script src="js/jquery-1.3.2.min.js" type="text/javascript"></script>');
		document.write('<script src="js/jquery-ui-1.7.2.custom.min.js" type="text/javascript"></script>');
		document.write('<script src="js/acordion.js" type="text/javascript"></script>');
        document.write('<link rel="stylesheet" type="text/css" href="css/iphone.css" />');	
}
else {
        document.write('<link rel="stylesheet" type="text/css" href="css/skin.css" />');
}



