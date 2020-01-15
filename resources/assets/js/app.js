/* eslint-disable no-new */

import Vue from 'vue';
import Vuex from 'vuex';
import svg4everybody from 'svg4everybody';

import './bootstrap';
import lang from './i18n';

// Common
import EButton from './components/common/button';
import ELabel from './components/common/label';
import ETable from './components/common/table';
import Breadcrumb from './components/common/breadcrumb';
import Icon from './components/common/icon';
import IconText from './components/common/icon-text';
import Pagination from './components/common/pagination';
import Placeholder from './components/common/placeholder';

// Todo
import Task from './components/tasks/task';
import Maintenance from './components/maintenance/maintenance';

// Accounts
// import ForgotPasswordForm from './components/accounts/forgot-password-form';
// import LoginForm from './components/accounts/login-form';
// import PasswordResetForm from './components/accounts/password-reset-form';
// import RegisterForm from './components/accounts/register-form';
// import ResendVerifyCodeForm from './components/accounts/resend-verify-code-form';
Vue.use(Vuex);

Vue.filter('trans', (...args) => lang.get(...args));

// Global
Vue.component('EButton', EButton);
Vue.component('ELabel', ELabel);
Vue.component('ETable', ETable);
Vue.component('Breadcrumb', Breadcrumb);
Vue.component('Icon', Icon);
Vue.component('IconText', IconText);
Vue.component('Pagination', Pagination);
Vue.component('Placeholder', Placeholder);
Vue.component('Task', Task);
Vue.component('Maintenance', Maintenance);

const store = new Vuex.Store({
	state: {
		count: 1,
	},

	mutations: {
		increment(state) {
			// mutate state
			state.count++;
		},
	},
});

new Vue({
	el: '#app',

	store,

	// Local
	components: {
		// App
		// ForgotPasswordForm,
		// LoginForm,
		// PasswordResetForm,
		// RegisterForm,
		// ResendVerifyCodeForm,

		// Styleguide
		// ExampleStyleguideOnlyComponent,
	},

	mounted() {
		svg4everybody();
	},
});
