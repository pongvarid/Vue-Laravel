
/**-------------------Import By View Folder-------------------------- */
 
import Login from '../view/Login';
import Logout from '../view/Logout';
import DataTable from '../view/Datatable';

import Dashboard from '../view/Dashboard';
import Main from '../view/Main';

import Root from '../view/Root/index.vue'; 
import Variable from '../view/Root/variable.vue';
import Choice from '../view/Root/choice.vue';  
import Theme from '../view/Root/theme.vue'; 

import Setting_Company from '../view/Setting/Company';   
import Setting_User from '../view/Setting/User';   
import Setting_Web from '../view/Setting/Web'; 

import Profile from '../view/UserProfile'; 

import Product from '../view/Product';
import Supplier from '../view/Supplier';
import Agent from '../view/Agent';
import Account from '../view/Account';

import test01 from '../view/Test/test-01';

/**-------------------Use in Router-------------------------- */
const routes = [
  
    {path:'/test01',component:test01},

    {path:'/login',component:Login},
    {path:'/logout',component:Logout},
    {path:'/dataTable',component:DataTable},
    /**-------------------Website Router  -------------------------- */
    {path:'/main',component:Main},
    {path:'/',component:Dashboard},

    /**-------------------Website Product  -------------------------- */
    {path:'/product',component:Product},

    /** ------------------ website Supplier ----------------------------*/
    {path: '/supplier', component:Supplier },

    /** ------------------ website Agent ------------------------------*/
    {path: '/agent', component:Agent },

    /** ------------------ website Account ------------------------------*/
    {path: '/account', component:Account },

    /**-------------------Website Setting  -------------------------- */
    {path:'/setting/company',component:Setting_Company},
    {path:'/setting/user',name:'user',component:Setting_User,  props: true},
    {path:'/setting/web',component:Setting_Web},
    
    /**-------------------Website Profile  -------------------------- */
    {path:'/profile',component:Profile},

    /**-------------------Admin Router-------------------------- */
    { path: '/root', component:Root  },
    { path: '/root/variable', component:Variable  },
    { path: '/root/choice', component:Choice  },
    { path: '/root/theme', component:Theme  },
];
 

export default routes;