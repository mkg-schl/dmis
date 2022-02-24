<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Design Your Report Here! -->

<div class="">
    <div class="Analytical-graph container" style="margin-top: 20px;">
        <div class="card">
            <div class="card-header">
                <h2>Analytical Report</h2>
            </div>
            <!-- Informations -->
            <div class="form-row" style="padding:10px;">
                <div class="totalProductsField col-md-6" style="padding:10px;">
                    <label for="totalProductsField">Total of Products Added</label>
                    <input name="totalProductsField" type="text" class="form-control" id="totalProductsField" value="1009" readonly>
                </div>
                <div class="totalProductsField col-md-6" style="padding:10px;">
                    <label for="totalProductsImportedField">Total of Products sold per week</label>
                    <input name="totalProductsImportedField" type="text" class="form-control" id="totalProductsImportedField" value="399" readonly>
                </div>
                </div>
                <!-- Graph here!!  -->



                
                <div class="panel-body"><!-- highchart -->
                    <div id="container"></div> 
                </div>





                <div id="activeUserLineChart" style="padding:10px;"></div>
            </div>      
        </div>
    </div>
    <div class="Report-graph container" style="margin-top: 20px;">
        <div class="card">
            <div class="card-header">
            <h2>Product Report</h2>
            </div>
            <div id="activeUsersLineChart">
            </div>
        </div>
    </div>
</div>
