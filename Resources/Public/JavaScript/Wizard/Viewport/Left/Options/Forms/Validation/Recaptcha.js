Ext.namespace('TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation');

/**
 * The recaptcha validation rule
 *
 * @class TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Recaptcha
 * @extends TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Rule
 */
TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Recaptcha = Ext.extend(TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Rule, {
	/**
	 * @cfg {String} rule
	 *
	 * The name of this rule
	 */
	rule: 'recaptcha',

	/**
	 * Constructor
	 *
	 * Add the configuration object to this component
	 * @param config
	 */
	constructor: function(config) {
		Ext.apply(this, {
			configuration: {
				message: TYPO3.l10n.localize('tx_form_system_validate_required.message'),
				error: TYPO3.l10n.localize('tx_form_system_validate_required.error')
			}
		});
		TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Recaptcha.superclass.constructor.apply(this, arguments);
	}
});

Ext.reg('typo3-form-wizard-viewport-left-options-forms-validation-recaptcha', TYPO3.Form.Wizard.Viewport.Left.Options.Forms.Validation.Recaptcha);