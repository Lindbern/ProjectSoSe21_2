$("#form_Arzt").validate({
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
	Name: {
		string: true,
		maxlength: 50
	},
	Vorname: {
		string: true,
		maxlength: 50
	},
	Email: {
		string: true,
		maxlength: 50
	},
	Fachrichtung: {
	},
	Fachrichtung_literal: {
		string: true,
		maxlength: 50
	}
}
});
