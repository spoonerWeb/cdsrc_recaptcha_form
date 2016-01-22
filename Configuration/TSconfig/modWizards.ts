mod.wizards {
	form {
		defaults {
			tabs {
				elements {
					accordions {
						predefined {
							showButtons := addToList(recaptcha)
						}
					}
				}
				options {
					accordions {
						validation {
							rules {
								recaptcha {
									showProperties = message, error
								}
							}
						}
                                        }
                                }
			}
		}
		elements {
                        recaptcha {
				showAccordions = validation
				accordions {
					validation {
						showRules = recaptcha
					}
				}
                        }
		}
	}
}
