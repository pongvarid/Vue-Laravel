import Vue from 'vue'
import Vuex from 'vuex'
import pathify from 'vuex-pathify';

import setting from './Mbs/setting';
import navbar from './Website/Navigationbar';
import authen from './Website/authen';
import Branch from './Website/Branch';


import Form from './Mbs/form';
import Default from './Mbs/default';
import Login from './Mbs/Login';

import permission from './Root/UserPermission';
import user from './Root/User';
import loading from './Website/loading';
import Variable from './Root/Variable';
import Choice from './Root/Choice';
import ChoiceDetail from './Root/ChoiceDetail';
import table from './Mbs/table';

import alert from './alert';

Vue.use(Vuex)

const modules = {
    alert:alert,
    navbar:navbar,
    setting:setting,
    authen:authen,
    loading:loading,
    Login:Login,

    Branch:Branch,

    form:Form,
    default:Default,

    table:table,

    permission:permission,
    user:user,
    Variable:Variable,
    Choice:Choice,
    ChoiceDetail,ChoiceDetail
}

export default new Vuex.Store({
    plugins: [pathify.plugin],
    modules : modules
})
