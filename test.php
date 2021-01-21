<!DOCTYPE html>
<html>
<script src="https://cdn.jsdelivr.net/npm/vue"></script>
<body>

<h2>Vue.js</h2>

<div id="app">
  {{ message }}
</div>

<p>
<button onclick="myFunction()">Click Me!</button>
</p>

<script>
var myObject = new Vue({
  el: '#app',
  data: {message: 'Hello Vue!'}
})

function myFunction() {
    myObject.message = "John Doe";
}
</script>

</body>
</html>

<!-- 
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Creating Dynamic Tabs in Bootstrap 4 via Data Attributes</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
	.bs-example{
    	margin: 20px;
    }
</style>
</head>
<body>
<div class="bs-example">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a href="#RICE" class="nav-link active" data-toggle="tab">RICE</a>
        </li>
        <li class="nav-item">
            <a href="#profile" class="nav-link" data-toggle="tab">Profile</a>
        </li>
        <li class="nav-item">
            <a href="#messages" class="nav-link" data-toggle="tab">Messages</a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade show active" id="RICE">
            <h4 class="mt-2">RICE</h4>
            <div class="form-row">                  
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">NFA 1</font>
                                    </label>
                                    <input type="text"  class="form-control form-control-sm" name="txtCat[]" value="9" hidden=""/>
                                    <input type="text"  class="form-control form-control-sm" name="txtCommodity[]" value="44" hidden=""/>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespOne[]"/>
                                </div>
                            </div>
                                            
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">NFA 2</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespTwo[]"/>
                                </div>
                            </div>
                                            
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">NFA 3</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespThree[]"/>
                                </div>
                            </div>

                                            
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">NFA 4</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFour[]"/>
                                </div>
                            </div>
                             
                                             
                            <div class="form-group px-3 row ml-4 mt-4">
                                <div class="col-lg-12">
                                    <label class="custom-label">
                                        <font class="text-xs">NFA 5</font>
                                    </label>
                                    <input type="number"  class="form-control form-control-sm" name="txtRespFive[]"/>
                                </div>
                            </div>
                    
                            <div class="col-lg-12 mt-2">
                                <h6 class="ml-4 text-gray-800"><b>COMMERCIAL (IMPORTED)</b></h6>
                            </div>   
                        </div> 
                        
        </div>
        <div class="tab-pane fade" id="profile">
            <h4 class="mt-2">Profile tab content</h4>
            <p>Vestibulum nec erat eu nulla rhoncus fringilla ut non neque. Vivamus nibh urna, ornare id gravida ut, mollis a magna. Aliquam porttitor condimentum nisi, eu viverra ipsum porta ut. Nam hendrerit bibendum turpis, sed molestie mi fermentum id. Aenean volutpat velit sem. Sed consequat ante in rutrum convallis. Nunc facilisis leo at faucibus adipiscing.</p>
        </div>
        <div class="tab-pane fade" id="messages">
            <h4 class="mt-2">Messages tab content</h4>
            <p>Donec vel placerat quam, ut euismod risus. Sed a mi suscipit, elementum sem a, hendrerit velit. Donec at erat magna. Sed dignissim orci nec eleifend egestas. Donec eget mi consequat massa vestibulum laoreet. Mauris et ultrices nulla, malesuada volutpat ante. Fusce ut orci lorem. Donec molestie libero in tempus imperdiet. Cum sociis natoque penatibus et magnis.</p>
        </div>
    </div>
</div>
</body>
</html> -->