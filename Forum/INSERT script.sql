use Forums
go

INSERT INTO rubrieken (rubriek, beschrijving)
	VALUES	('Reisgenoten', 'Hier wordt gepraat over reisgenoten'),
			('Vermist', 'Hier wordt gepraat over vermissingen met het bergbeklimmen'),
			('Uitrusting', 'Hier wordt gepraat over uitrusting van en voor bergbeklimmers')

INSERT INTO posts (id, rubriek, gebruiker, kop, tekst, unixtijd)
	VALUES	(1, 'Reisgenoten', 'Guus', 'reisgenoot gezocht!', 'Hallo mensen, Ik ben Guus uit Langenboom noordoost-Brabant, en 21 jaar. Ik wil zeer graag (leren) bergbeklimmen. Heb nog weinig ervaring met het bereiken van de top en alpinisme (1500 m. en 2500 m.)... Ook heb ik nog geen complete uitrusting. Deze heb ik wel bijna bij elkaar gespaard Maar.. Ben in uitstekende conditie, zeer ambitieus en leergierig. Graag zou ik samen met iemand, man/vrouw jong/oud, de bergen in willen gaan! Groeten Guus', 1547372497),
			(2, 'Reisgenoten', 'Peter Meier', 'reisgenoot gezocht!', 'Hoi Guus, Welkom hier. Een onderdeel van berg beklimmen is sportklimmen. Zoek een hal bij jou in de buurt en ga daar sportklimmen. Dan leer je ook een hoop mensen kennen die frequent de bergen in gaat. Van daaruit kun je gemakkelijker iemand treffen waarmee je evt. de bergen in kunt gaan.', 1547372650)
