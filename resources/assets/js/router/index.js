
/**-------------------Import By View Folder-------------------------- */
 
import Login from '../view/Login';
import Logout from '../view/Logout';

import Main from '../view/Main';
import DataTable from '../view/Datatable';
import Component from '../view/Component';

import Root from '../view/Root/index.vue'; 
import Variable from '../view/Root/variable.vue';
import Choice from '../view/Root/choice.vue';  

import Setting_Company from '../view/Setting/Company';   
import Setting_User from '../view/Setting/User';   
import Setting_Web from '../view/Setting/Web';   

/**-------------------Use in Router-------------------------- */
const routes = [
  
    {path:'/login',component:Login},
    {path:'/logout',component:Logout},
    /**-------------------Website Router-------------------------- */
    {path:'/main',component:Main},
    {path:'/Datatable',component:DataTable},
    {path:'/Component',component:Component},

    {path:'/setting/company',component:Setting_Company},
    {path:'/setting/user',component:Setting_User},
    {path:'/setting/web',component:Setting_Web},

    /**-------------------Admin Router-------------------------- */
    { path: '/root', component:Root  },
    { path: '/root/variable', component:Variable  },
    { path: '/root/choice', component:Choice  },

];
 

export default routes;