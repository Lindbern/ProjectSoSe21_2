$("#form_Impftermin").validate({
rules: {
	id: {
	},
	c_ts: {
		string: true
	},
	m_ts: {
		string: true
	},
	identifier: {
		string: true,
		maxlength: 50
	},
	Termin: {
		string: true
	},
	Aussage: {
		integer: true,
		digits: true
	},
	Ausführung: {
		integer: true,
		digits: true
	},
	Impfbericht: {
		string: true,
		maxlength: 50
	},
	_Patient: {
		string: true,
		required: true
	},
	_Arzt: {
		string: true,
		required: true
	},
	_Patient_identifier: {
		string: true,
		maxlength: 50
	},
	_Arzt_identifier: {
		string: true,
		maxlength: 50
	}
}
});
