$("#form_Impfstoff").validate({
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
	Bezeichnung: {
		string: true,
		maxlength: 50
	},
	Hersteller: {
		string: true,
		maxlength: 50
	},
	Zulassungsdatum: {
		string: true
	},
	Zulassungsstelle: {
		string: true,
		maxlength: 50
	},
	_Impftermin: {
		string: true,
		required: true
	},
	_Impfstoffart: {
		string: true,
		required: true
	},
	_Impftermin_identifier: {
		string: true,
		maxlength: 50
	},
	_Impfstoffart_identifier: {
		string: true,
		maxlength: 50
	}
}
});
