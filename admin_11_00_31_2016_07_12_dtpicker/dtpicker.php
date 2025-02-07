<html>
<head>
    <link rel="stylesheet" href="css/pikaday.css">
    <link rel="stylesheet" href="css/site.css">
<title>DatePicker</title></head>
<body>
<form name="abc">
<input type="text" id="datepicker">
  <script src="moment.min.js"></script>
 <script src="pikaday.js"></script>

    <script>

    var picker = new Pikaday(
    {
        field: document.getElementById('datepicker'),
		format: 'YYYY-MM-DD',
        firstDay: 1,
        minDate: new Date(),
        maxDate: new Date(2020, 12, 31),
        yearRange: [2000,2020],
		
    });

    </script>
</form></body>
</html>