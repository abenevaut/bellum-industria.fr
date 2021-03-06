<?php

return [

	'civility' => 'Civility',
	'civilities' => 'Civilities',
	'civility.madam' => 'Madam',
	'civility.miss' => 'Miss',
	'civility.mister' => 'Mister',
    'civility_name'      => 'Civility name',

	'roles' => 'Roles',
	'role' => 'Role',
	'role.administrator' => 'Administrator',
	'role.accountant' => 'Accountant',
	'role.customer' => 'Customer',

	'locale' => 'Language',
	'timezone' => 'Time zone',
	'first_name' => 'First name',
	'last_name' => 'Last name',
	'email' => 'email',
	'password' => 'Password',
	'password_confirmation' => 'Confirm password',

    'impersonate'        => 'Impersonate',
    'stop_impersonation' => 'Admin session',

	'title' => 'Users',
	'create.title' => 'New user',
	'edit.title' => 'Edit user',
	'show.title' => 'User :username',
	'index_total_users' => 'Total number of uuser(s): :total_user',
	'index_no_data_title' => 'No user',
	'index_no_data_description' => 'No user exist',
	'delete_message' => 'Are you sure you want to delete the user :username?',
	'export_sheet_title' => 'users_list_:date.csv',
	'export_total_user' => 'Number of user(s) exported: :nb_users',

	'message_created_success' => "User successfully added",
	'message_updated_success' => "User has been successfully updated",
	'message_deleted_success' => "User has been deleted",
	'message_user_tried_to_delete_his_own_account_error' => 'You cannot delete your own user account',

    'profiles.family_situation' => 'Situation familiale',
    'profiles.family_situation.single' => 'Célibataire',
    'profiles.family_situation.married' => 'Marié(e)',
    'profiles.family_situation.concubinage' => 'Concubinage',
    'profiles.family_situation.divorcee' => 'Divorcé(e)',
    'profiles.family_situation.widow_er' => 'Veuf / Veuve',
    'profiles.maiden_name' => 'Nom de jeune fille',
    'profiles.birth_date' => 'Date de naissance',
    'profiles.providers_tokens' => 'Lier vos comptes sociaux',
    'profiles.edit.title' => 'Profil utilisateur',

    'leads.title' => 'Leads',
    'leads.transformed_user' => 'Transformed user',
    'leads.button.transform_into_user' => 'Transform into a user',
    'leads.button.show_user' => 'User profile',
    'leads.index_total_leads' => 'Number of lead(s) : :total_lead',
    'leads.index_no_data_title' => 'No lead',
    'leads.index_no_data_description' => 'No lead exists',
    'leads.lead_succefully_transformed_to_user' => 'The lead has been transformed into a user, an email has been sent to initialize the account.',
    'leads.transform_message' => 'Are you sure you want to transform this lead :username ?',

    'leads.contacts' => 'Contacts',
    'leads.contact_form' => 'Contact form',
    'leads.send' => 'Send',
    'leads.subject' => 'Subject',
    'leads.message' => 'Message',
    'leads.baseline' => 'Are you missing information? A question ? Do not hesitate to contact us.',
    'leads.certify' => 'You certify that the above information is true and correct.',

    'leads.handshake_title' => 'New contact, :civility_name',
    'leads.handshake_subject' => 'New contact, :subject',
    'leads.handshake_body_header' => 'You have just contacted us with the following message:',
    'leads.handshake_body_footer' => 'We will respond as soon as possible. <br/> <br/> The Obsession.city team',

];
