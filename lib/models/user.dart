class User {
    String? id;
  String? name;
  String? email;
  String? phone;
  String? homeaddress;

  User({this.id, this.name, this.email, this.phone, this.homeaddress});

  User.fromJson(Map<String, dynamic> json) {
    id = json['id'];
    name = json['name'];
    email = json['email'];
    phone = json['phone'];
    homeaddress = json['homeaddress'];
  }

  Map<String, dynamic> toJson() {
    final Map<String, dynamic> data = <String, dynamic>{};
    data['id'] = id;
    data['name'] = name;
    data['email'] = email;
    data['phone'] = phone;
    data['homeaddress'] = homeaddress;
    return data;
  }
}