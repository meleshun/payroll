# Payroll

#### Description:
> We have a plant. This plant divided on 3 departments.  
> Each department has 10 workers.  
> Each department produce different products.  
> 1 department - TV sets, 2 - computers, 3 - mobile phones.  
> Every month workers receive a salary depending on amount of produced products and product types.  

Each products has different NET price:

| Products | Price |
| ------ | ------ |
| Mobile phones | 500$ |
| TV sets | 1000$ |
| Computers | 1500$ |

Static coefficient for workers (income ratio) = 0.15  
Salary formula: PRODUCT COST * AMOUNT OF PRODUCED PRODUCTS * COEFFICIENT  

#### Development task:
- Forms for create + view + edit payroll.
- Forms should contain next information: Worker name, Department, Amount of produced products and calculated salary based on formula.
- JS validation (salary shouldn't be more than 1500$)
- search by workers name on view form
- sorting by amount of products or total salary or departments (on view form).