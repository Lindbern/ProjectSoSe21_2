$("#form_Dokument").validate({
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
		required: true
	},
	dateiname: {
	},
	_Patient: {
		string: true,
		required: true
	},
	Bezeichnung_literal: {
		string: true,
		maxlength: 50
	},
	dateiname_upload: {
		string: true
	},
	dateiname_path: {
		string: true,
		maxlength: 50
	},
	dateiname_title: {
		string: true,
		maxlength: 50
	},
	dateiname_description: {
		string: true,
		maxlength: 50
	},
	_Patient_identifier: {
		string: true,
		maxlength: 50
	}
}
});
