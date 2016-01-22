Ext.namespace('TYPO3.Form.Wizard.Elements.Predefined');

/**
 * The predefined RECAPTCHA element
 *
 * @class TYPO3.Form.Wizard.Elements.Predefined.Recaptcha
 * @extends TYPO3.Form.Wizard.Elements.Basic.Textline
 */
TYPO3.Form.Wizard.Elements.Predefined.Recaptcha = Ext.extend(TYPO3.Form.Wizard.Elements.Basic.Textline, {
	/**
	 * @cfg {String} elementClass
	 * An extra CSS class that will be added to this component's Element
	 */
	elementClass: 'recaptcha',

	/**
	 * @cfg {Mixed} tpl
	 * An Ext.Template, Ext.XTemplate or an array of strings to form an
	 * Ext.XTemplate. Used in conjunction with the data and tplWriteMode
	 * configurations.
	 */
	tpl: new Ext.XTemplate(
		'<div class="overflow-hidden">',
			'<tpl for="label">',
                            '<label for="">{value}{[this.getMessage(parent.validation)]}</label>',
			'</tpl>',
                        '<img src="../typo3conf/ext/cdsrc_recaptcha_form/Resources/Public/Images/recaptcha.jpg" alt="" />',
		'</div>',
		{
			compiled: true,
			getMessage: function(rules) {
				var messageHtml = '';
				var messages = [];
				Ext.iterate(rules, function(rule, configuration) {
					if (configuration.showMessage) {
						messages.push(configuration.message);
					}
				}, this);

				messageHtml = ' <em>' + messages.join(', ') + '</em>';
				return messageHtml;

			}
		}
	),
        
	/**
	 * Initialize the component
	 */
	initComponent: function() {
		var config = {
			configuration: {
				attributes: {
					name: 'recaptcha'
				},
				label: {
					value: TYPO3.l10n.localize('elements_label_recaptcha')
				},
				validation: {
					recaptcha: {
						message: TYPO3.l10n.localize('tx_form_system_validate_required.message'),
						error: TYPO3.l10n.localize('tx_form_system_validate_required.error')
					}
				}
			}
		};

			// MERGE config
		Ext.merge(this, config);
                
			// call parent
		TYPO3.Form.Wizard.Elements.Predefined.Recaptcha.superclass.initComponent.apply(this, arguments);
	}
});

Ext.reg('typo3-form-wizard-elements-predefined-recaptcha', TYPO3.Form.Wizard.Elements.Predefined.Recaptcha);