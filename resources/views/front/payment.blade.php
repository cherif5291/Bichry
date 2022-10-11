
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://js.stripe.com/v3/"></script>
</head>
<body>
    <script type="text/javascript">
        var stripe = Stripe('pk_test_51KFIYICqfjPSAnLhBN0YjhNbFfdJHPIVQnI5hGTnhhXi9wL4O3VSee0zX3Qa7dQIPpnagcSoAutuEYHyQFTKWZak00ewazJPYD');
        var session = "{{$session['id']}}";
        stripe.redirectToCheckout({sessionId: session})
        .then(function(result){
            alert('ok')
            console.log(result)
            if(result.error){
                alert(result.error.message);
            }
        })
        .catch(function(error){
            alert('ok')
            console.error('Error: ', error);
        });
    </script>
</body>
</html>
