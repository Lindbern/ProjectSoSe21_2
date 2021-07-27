$("#form_Impfstoffart").validate({
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
	ImpfstoffBez: {
	},
	Beschreibung: {
		string: true,
		maxlength: 50
	},
	ImpfstoffBez_literal: {
		string: true,
		maxlength: 50
	}
}
});
