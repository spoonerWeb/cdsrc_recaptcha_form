
Ext.override(TYPO3.Form.Wizard.Viewport.Left.Elements.Predefined, {
    /**
     * Constructor
     *
     * Add the buttons to the accordion
     */
    initComponent: function() {
        var allowedButtons = TYPO3.Form.Wizard.Settings.defaults.tabs.elements.accordions.predefined.showButtons.split(/[, ]+/);
        var buttons = [];

        allowedButtons.each(function(option, index, length) {
            switch (option) {
                case 'email':
                    buttons.push({
                        text: TYPO3.l10n.localize('predefined_email'),
                        id: 'predefined-email',
                        clickEvent: 'dblclick',
                        handler: this.onDoubleClick,
                        iconCls: 'formwizard-left-elements-predefined-email',
                        scope: this
                    });
                    break;
                case 'radiogroup':
                    buttons.push({
                        text: TYPO3.l10n.localize('predefined_radiogroup'),
                        id: 'predefined-radiogroup',
                        clickEvent: 'dblclick',
                        handler: this.onDoubleClick,
                        iconCls: 'formwizard-left-elements-predefined-radiogroup',
                        scope: this
                    });
                    break;
                case 'checkboxgroup':
                    buttons.push({
                        text: TYPO3.l10n.localize('predefined_checkboxgroup'),
                        id: 'predefined-checkboxgroup',
                        clickEvent: 'dblclick',
                        handler: this.onDoubleClick,
                        iconCls: 'formwizard-left-elements-predefined-checkboxgroup',
                        scope: this
                    });
                    break;
                case 'name':
                    buttons.push({
                        text: TYPO3.l10n.localize('predefined_name'),
                        id: 'predefined-name',
                        clickEvent: 'dblclick',
                        handler: this.onDoubleClick,
                        iconCls: 'formwizard-left-elements-predefined-name',
                        scope: this
                    });
                    break;
                case 'recaptcha':
                    buttons.push({
                        text: TYPO3.l10n.localize('predefined_recaptcha'),
                        id: 'predefined-recaptcha',
                        clickEvent: 'dblclick',
                        handler: this.onDoubleClick,
                        iconCls: 'formwizard-left-elements-predefined-recaptcha',
                        scope: this
                    });
                    break;
            }
        }, this);

        var config = {
            items: buttons
        };

        // apply config
        Ext.apply(this, Ext.apply(this.initialConfig, config));

        // call parent
        TYPO3.Form.Wizard.Viewport.Left.Elements.Predefined.superclass.initComponent.apply(this, arguments);
    }
});