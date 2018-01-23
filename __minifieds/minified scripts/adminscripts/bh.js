

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
    $.alert('Graph data of bookings will be shown if there is atleast one record')
  }
    
});
