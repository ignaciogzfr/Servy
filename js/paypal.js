
  paypal.Buttons({
    createOrder: function(data, actions) {
      return actions.order.create({
        purchase_units: [{
          amount: {
            value: '2.00'
          }
        }]
      });
    },
    onApprove: function(data, actions) {
      return actions.order.capture().then(function(details) {
        window.alert("Transaccion completada");

        // Call your server to save the transaction
      var idcliente = data.payerID;
      var idtran = data.orderID;
       var id = $('#id-usuario').val();
          $.ajax({

              method: 'POST',
              url: 'controladores/usuarios-controller.php',
              data: 'op=iniciartransaccion&id='+id+'&idtran='+idtran+'&idcliente='+idcliente,
              success:function(response){
          console.log(response)
          if(response = 'ok'){
          location.href="perfil.php?id="+id
          }
            }
          })
        return fetch('/paypal-transaction-complete', {
          method: 'post',
          headers: {
            'content-type': 'application/json'
          },
          body: JSON.stringify({
            orderID: data.orderID
          })
        });
      });
    },
  }).render('#paypal-button-container');











