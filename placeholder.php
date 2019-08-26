<?php

  if(isset($_GET["item"])){
	  
	  $page=$_GET["item"];
	  
	  if($page==1){
		  
		include("pages/page1.php");  
		
	  }elseif($page==2){
		  
		include("pages/page2.php");  
		
	  }else if($page==3){
		
		include("pages/user/create_user.php");  
		  
	  }else if($page==4){
		
		include("pages/user/view_user.php");  
		  
	  }else if($page==5){
		
		include("pages/user/manage_user.php");  
	  }else if($page==77){
		
		include("pages/user/edit_user.php");
	  }
		// Finish User





	  
	  else if($page=="create-supplier"){
		  include("pages/supplier/create_supplier.php");
	  }else if($page=="view-supplier"){
		  include("pages/supplier/view_supplier.php");
	  }else if($page=="manage-supplier"){
		  include("pages/supplier/manage-supplier.php");
	  }else if($page=="edit-supplier"){
		include("pages/supplier/edit-supplier.php");
	  }

	  // Finish Supplier
	  

	  else if($page==6){
		include("pages/product/create_product.php");  
	  }else if($page==7){
		include("pages/product/view_product.php");  
	  }else if($page==8){
		include("pages/product/manage_product.php");
	  }else if($page=="edit_product"){
		include("pages/product/edit_product.php");
	  } 

	  // Finish Product


		   
	  else if($page=="create-purchase"){
		  include("pages/purchase/create_purchase.php");
	  }else if($page=="view-purchase"){
		include("pages/purchase/view_purchase.php");
	  }else if($page=="manage-purchase"){
		include("pages/purchase/manage_purchase.php");
	  }else if($page=="edit-purchase"){
		include("pages/purchase/edit_purchase.php");
	  }else if($page=="view-purchase-invoice"){
		include("pages/purchase/view-purchase-invoice.php");
	  }

	  // Finish Purchase


	  else if($page=="create-purchase-rtn"){
		include("pages/purchase_return/create_purchase_rtn.php");
	}else if($page=="manage-purchase-rtn"){
	  include("pages/purchase_return/manage_purchase_rtn.php");
	}

	//Finish Purchase Return

	  else if($page=="create-sales"){
		include("pages/sales/create_sales.php");
	}else if($page=="view-sales"){
	  include("pages/sales/view_sales.php");
	}else if($page=="manage-sales"){
	  include("pages/sales/manage_sales.php");
	}else if($page=="edit-sales"){
	  include("pages/sales/edit_sales.php");
	}else if($page=="view-sales-invoice"){
	  include("pages/sales/view-sales-invoice.php");
	}

	// Finish Sales
/*
	else if($page=="create-sales"){
		include("pages/sales/create_sales.php");
	}else if($page=="view-sales"){
	  include("pages/sales/view_sales.php");
	}else if($page=="manage-sales"){
	  include("pages/sales/manage_sales.php");
	}else if($page=="edit-sales"){
	  include("pages/sales/edit_sales.php");
	}else if($page=="view-sales-invoice"){
	  include("pages/sales/view-sales-invoice.php");
	}
*/
	// Finish Sales Return

	else if($page=="create-stock"){
		include("pages/stock/create_stock.php");
	}else if($page=="view-stock"){
	  include("pages/stock/view_stock.php");
	}else if($page=="manage-stock"){
	  include("pages/stock/manage_stock.php");
	}else if($page=="edit-stock"){
	  include("pages/stock/edit_stock.php");
	}else if($page=="view-stock-invoice"){
	  include("pages/stock/view-stock-invoice.php");
	}

	// Finish Sales

	  else if($page=="create-customer"){
		include("pages/customer/create_customer.php");
	}else if($page=="view-customer"){
	  include("pages/customer/view_customer.php");
	}else if($page=="manage-customer"){
	  include("pages/customer/manage_customer.php");
	}else if($page=="edit-customer"){
	  include("pages/customer/edit_customer.php");
	}
	  // Finish Customer


	else if($page=="customer-due"){
		include("pages/due/customer_due.php");
	}else if($page=="customer-due-details"){
	  include("pages/due/customer-due-details.php");
	}

	// Finish Due


	else if($page=="sales-reports"){
		include("pages/sales_report/sales_report.php");
	}
	
	// Finish Sales Reports


	else if($page=="expense-reports"){
		include("pages/expenses/expense_reports.php");
	}

	// Finish Expense Reports
	} else{
		include("dashboard.php");//startup page
	}
?>