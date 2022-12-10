# SnapFood-clone
this as  a copy of  snappfood ordering  online  
you should  know we  have  three  accessible users  in thist clone
admin users have  ability to
-create resturant categories and  manage  them
-create food categories and manage them
-discount manager
and  add banner  in view


-------------------------------------------------------------------------------------------
manager  users  have ability to do
 in the  first  step a manager should  login or  register  in website
 second  the manager should  complete self  restaurant information
 then manager  can use other  facilities in dashboard
 
 the  restaurant  need more  set ups such ad  schedule  workday and  delivery cost
 and edit them all of  them accessible in restaurant  setting  is available
 
 in food management you can make  a  food  and  add it  to restaurant  menu you can add discount to foods
 and  add foods  to snap party but  this  feature  not added right now
 
 
 each manager  can manage their restaurant  orders  and  filter  them  by week , month  and  year and  manage  situation of food status if  a  order  delivered and  taken over  you can see  that  order  in archive in dashboard
 
 you can see if a user paid or  not 
 
 
 and  admins  can  export  their sells in reports  in dashboard
 
 in comment manager part  the  comments  are listed  with information  to see and  manager  can accept them or  answer them or request to delete them from admin panel
 
 -------------------------------------------------------------------------------------------
 whole  user part  designed  in api
 
 all user can login and register
 
 users  can add multiple address and  set  one  of  them as  current address for delivering  food
  users  can see  every food  in every restaurants 
 
 
 adding addresses and  set  current address
 users  can see resturants  info and  see  if  they are  open or  not
 
 all users  can order  food  in diffrent  resturant  or  foods 
 and  in which category their  want 
 users  can comment  on their  orders  and  manager  can accept  and  answer them
 
 
 -----------------------------------------------------------------------------------------------
 premitive  set up
 
 
 when use  to clone  the  application
 you should first migrate the  tables
 
 with
 - php artisan migrate:fresh --seed
seed  is  for  a  couple  manager  , user and admin default

then

for login as  admin
change  end of  url to
---------------------------
/admins-login
---------------------------
and fill out  like  this

admin email:shahriar.purmalek@gmail.com
admin pass: 12345678






