<style>
.loader-container{
  margin: 0px;
  display: flex;
	align-items: center;
	justify-content: center;
	min-height: 100vh;
	background-color: #c1c1c1;
}
.pre-loader {
  margin-left: auto;
  margin-right: auto;
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite;
}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>
<!--
<div class="loader-container">
  <div class="pre-loader"></div> 
</div>
-->