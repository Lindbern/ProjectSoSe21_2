$("#form_Patient").validate({
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
	Nachname: {
		string: true,
		maxlength: 50
	},
	Name: {
		string: true,
		maxlength: 50
	},
	Geburtsdatum: {
		string: true
	},
	Telefonnummer: {
		string: true,
		maxlength: 50
	},
	Adresse: {
	},
	Adresse_Nachname: {
		string: true,
		maxlength: 50
	},
	Adresse_Vorname: {
		string: true,
		maxlength: 50
	},
	Adresse_Straße: {
		string: true,
		maxlength: 50
	},
	Adresse_PLZ: {
		string: true,
		maxlength: 50
	},
	Adresse_Ort: {
		string: true,
		maxlength: 50
	}
}
});
