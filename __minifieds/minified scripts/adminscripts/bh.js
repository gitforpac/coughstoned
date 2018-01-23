

$.get('/getgraphdata',(res) => {

  if(res!== false) {

    var gdata = [];
    var objdata = {};
    res.forEach(function(e) {
      gdata.push({package: e.name, value: e.total})
    });

     new Morris.Bar({

    element: 'myfirstchart',

    data: gdata,

    xkey: 'package',

    ykeys: ['value'],

    labels: ['Bookings']

  });

  } else {
    $('#myfirstchart').html('<h5>No data to be shown for now</h5>')
  }
    
});
