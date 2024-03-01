(function ($) {
    'use strict';

    const readData = (dbCollection) => {
        // db.collection(collectionName)
        console.log('in read data')
        return dbCollection
            .get()
            .then(querySnapshot => {
                let result = {}
                querySnapshot.forEach(doc => {
                result[doc.id] = doc.data()
                })
                if (Object.keys(result).length === 0) {
                result['error'] = 'No results found.'
                }
                // appendData(collectionName, result, listElemnt)
                console.log('in then')
                console.log('results', result)
                return result;
            })
    }

    // const retrieveData = async (data) => {
    //     await readData(data);
    //     return newdata;
    // }
    $(document).ready(function () {
        const showFirestoreDatabase = () => {
            const db = firebase.firestore();
            const firestoreEl = jQuery('#custom-firebase');

            const firestoreCol = jQuery('#firebase-collection');
        
            // You can get the collectionName and documentName from the shortcode attribute
            const collectionName = 'Events';
            const documentName = '5ny4LZzGaL6C9j5eZL3'

        
            if (collectionName && documentName) {
                // const docRef = db.collection(collectionName);
                const docRef = db.collection(collectionName).doc(documentName);
                console.log('first', db.collections)
                console.log('second', db.collection(collectionName))
        

                let obj;
                obj = readData(db.collection(collectionName));
                // let obj = retrieveData(db.collection(collectionName));
                var show;
                readData(db.collection(collectionName)).then((res) => {
                    for (const val of Object.values(res)) {
                        console.log(val)
                        show = val['Event Name']
                    }
                    console.log('testing',show)
                    firestoreCol.append(show)

                })



                docRef.get().then(doc => {
                    if (doc.exists) {
                        console.log('Document data:', doc.data());
                        let html = '<table>';
                        jQuery.each(doc.data(), function (key, value) {
                            // You can put condition to filter your value
                            // and it won't show on the frontend
                            html += '<tr>';
                            html += `<td> ${String(key)} </td>`;
                            html += '<td>' + value + '</td>';
                            html += '</tr>';
                        })
                        html += '</table>';
                        firestoreEl.append(html)


                        // $('p#firebase-collection').text('collection text')
                    } else {
                        // doc.data() will be undefined in this case
                        console.error('Please check your collection and document name in the [firestore] shortcode!');
                    }
                }).catch(error => {
                    console.error('Please check your collection and document name in the [firestore] shortcode!', error);
                });
            } else {
                console.warn('Please check your collection and document name in the [firestore] shortcode!');
            }
        }
        
        showFirestoreDatabase()
    })
})(jQuery)