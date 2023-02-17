<?php 
extract($_POST);
if(isset($submit))
{
    $annualTax = 0;
    $annualSalary = 0;
    

	switch($_POST['type']) {

		case 'Bi-Monthly':
		$annualSalary = $salary * 24;
		break;
		
		case 'Monthly':
		$annualSalary = $salary * 12;
		break;
	}

        if ($annualSalary > 8000000) {
          $annualTax = 2410000 + ($annualSalary - 8000000) * 0.35;
        }
        
        else if ($annualSalary > 2000000) {
          $annualTax = 490000 + ($annualSalary - 2000000) * 0.32;
        } 
        
        else if ($annualSalary > 800000) {
          $annualTax = 130000 + ($annualSalary - 800000) * 0.3;
        } 
        
        else if ($annualSalary > 400000) {
          $annualTax = 30000 + ($annualSalary - 400000) * 0.25;
        } 
        
        else if ($annualSalary > 250000) {
          $annualTax = ($annualSalary - 250000) * 0.2;
        }

    $monthlyTax = $annualTax / 12;
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset=utf-8 />
        <link href="mp1.css" media="all" rel="Stylesheet" type="text/css"/>
        <title>TAXXY: A TAX CALCULATOR</title>
    </head>
    <body>

        <center>
        <fieldset id="header">
                <p>TAXXY: A TAX CALCULATOR</p>
            </fieldset>
            
            <div class="content">
                    <form action="" method="POST">
                        <label for="salary">Salary: &nbsp;&nbsp;&nbsp; ₱ &nbsp;</label>
                        <input type="number" name="salary" id="salaryAmount" value="<?php  echo @$salary;?>"/><br><br>
                        <label for="type">Type: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        <input type="radio" name="type" id="biMonthly" value="Bi-Monthly"> Bi-Monthly &nbsp;&nbsp;
                        <input type="radio" name="type" id="Monthly" value="Monthly"> Monthly
                        <br><br><br>
                        <input type="submit" value="Compute" id="btnCompute" name="submit"> <br><br><br>
                    </form>
                    <fieldset id="results">
                    <div>
                        <p>Annual Salary: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="number" readonly="readonly" id="result" disabled="disabled" value="<?php  echo @$annualSalary;?>"/></p>
                        <p>Est. Annual Tax: &nbsp;&nbsp;&nbsp;&nbsp;<input type="number" readonly="readonly" id="result"  disabled="disabled" value="<?php  echo @$annualTax;?>"/></p>
                        <p>Est. Monthly Tax: &nbsp;&nbsp;<input type="number" readonly="readonly" id="result" disabled="disabled" value="<?php  echo @$monthlyTax;?>"/></p>
                    </div>
                    </fieldset>
            </div> <br>
            <footer>
                <p> Machine Problem 1 by Cassandra Eunice B. Cortez</p>
            </footer>
        </center>

    </body>

</html>